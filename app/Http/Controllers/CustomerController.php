<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Item;
use App\Http\Requests;
use App\Customer;
use App\Option;
use App\OptionChoice;
use App\CustomerRatings;
use App\CustomerFavourites;
use App\User;
use App\Orders;
use Auth;
use Carbon\Carbon;
use DB;
use Validator;
use Event;
use App\Events\OrderWasSubmitted;
use App\Events\OrderWasCanceled;


class CustomerController extends Controller
{


  public function __construct()
  {
    $this->middleware('auth');
  }

  public function searchrestaurants(Request $request ){

      $term = $request->term;
      $restaurants =  Restaurant::where('companyname', 'LIKE', "%$term%")->get();
      return view('customercontent.customer-overview',compact('restaurants'));

  }


  /**
    Updates the user info with the data eneterd in the update user info page
  */
  public function updateinfo(Request $request){

    $validator = $this->validatecustomerupdate($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
    $this->updateDatabaseWithNewInfo($request);
    return redirect()->action('CustomerController@showcustomeroverview');
  }

  /**
    Updates the database with the updated info of the customer

  */
  protected function updateDatabaseWithNewInfo(Request $request){

    if(\Auth::check()) {
            $id = \Auth::user()->id;
        }

    $updateUser = User::find($id);
    $updateUser->name = $request->name;
    $updateUser->email = $request->email;
    $updateUser->address = $request->address;
    $updateUser->save();


    $updateCustomer = Customer::find($id);
    $updateCustomer->phoneno = $request->phoneno;
    $updateCustomer->save();
  }

  protected function validatecustomerupdate(array $data)
    {
    if(\Auth::check()) {
            $email = \Auth::user()->email;
        }

    if($data['email'] != $email){ //need to check if they didnt change email
      return Validator::make($data, [
                'email' => 'email|max:255|unique:users',
        'phoneno' => 'max:13',
        'address' => 'max:60',
            ]);
    }else{
      return Validator::make($data, [
        'phoneno' => 'max:13',
            ]);
    }


    }


  public function validatecustomerlogin(Request $request){//Why does this redirect to the method directly below? I remeber it had somethign to do with the url
        return redirect()->action('CustomerController@showcustomeroverview');
  }

  public function showcustomeroverview(){
		$restaurants = Restaurant::orderBy('is_open', 'desc')->get();

    return view('customercontent.customer-overview',compact('restaurants'));
  }

    public function sortrestaurantlistalphabetically(){
    $restaurants = Restaurant::orderBy('is_open', 'desc')
                   ->orderBy('companyname', 'asc')
                   ->get();
    return view('customercontent.customer-overview',compact('restaurants'));
  }


  public function sortbyfavourites(){
    $restaurants = Restaurant::get();

    if(\Auth::check()) {
       $id = \Auth::user()->id;
    }
    $favouriteRestaurants = DB::table('customer_favourites')
        ->where('customer_id',$id)
        ->get();

    foreach($favouriteRestaurants as $favRelation){
        $favouriteRestaurant = Restaurant::where('id',$favRelation->restaurant_id)->first();
        $restaurants->prepend($favouriteRestaurant);
    }
    $restaurants = $restaurants->unique();

    return view('customercontent.customer-overview',compact('restaurants'));
  }


 


  public function showcustomermenu(Restaurant $restaurant){
    $id = $restaurant->id;
    $restaurantInfo = Restaurant::where('id',$id)->first();
    return view('customercontent.customer-menuoverview', compact("restaurant","restaurantInfo"));

  }

  public function itemOptions(Item $item){
    if($item->option_id != null){
      $option = $item->option;
      return view('customercontent.customer-item-options-form', compact("option"));
    } else {
      return null;
    }
  }

  public function showcustomerconfirmation(){
    if(\Auth::check()) {
       $user = \Auth::user()->id;
    }

    $order = Orders::where('customer_id',$user)->where('completed','0')->get();

    return view('customercontent.confirmationpage', compact('order'));
  }

  public function addItem(Request $request){
    $item = Item::find($_POST["itemid"]);
    $restaurant = Restaurant::find($item->restaurant->id);
    if($restaurant->is_open == 0){//if the restarant is closed
     // return redirect('/customeroverview')->with('status', 'This restaurant is closed and cannot be ordered from.');
      return redirect('error')->with('error-title', 'Error adding item')->with("error-message", "This restaurant is closed and cannot be ordered from.");
    }
    if(!\Auth::user()->isRestaurant){
      $currentCart = \Auth::user()->customer->cart;
      if(count($currentCart) > 0 && $currentCart[0]->restaurant_id != $item->restaurant->id){
        return redirect('error')->with('error-title', 'Error adding item')->with("error-message", "You already have items in a cart with a different restaurant. Please clear your cart before adding items from this restaurant.");
      }

      $o = new Orders;

      if(isset($_POST["item-option-combo"])){
        $o->choice = $_POST["item-option-combo"];
      } elseif(isset($_POST["item-option-check"]) && count($_POST["item-option-check"])>0){
        $selected = $_POST["item-option-check"];
        $choices = strval($selected[0]);
        for($i=1; $i<count($selected); $i++){
          $choices .= ",".$selected[$i];
        }
        $o->choice = $choices;
      } elseif(isset($_POST["item-option-text"])){
        $o->choice = $_POST["item-option-text"];
      }

      $updating = false;
      foreach ($currentCart as $cartItem) {
        if($cartItem->item_id == $item->item_id && $cartItem->choice == $o->choice){
          $updating = true;
          $cartItem->quantity = $cartItem->quantity + $_POST["qty"];
          $cartItem->save();
          return back();
        }
      }
      if(!$updating){
        if(count($currentCart) > 0){
          $o->order_id = $currentCart[0]->order_id;
        }

        $o->customer_id = \Auth::user()->id;
        $o->item_id = $item->item_id;
        $o->restaurant_id = $item->restaurant->id;
        $o->quantity = $_POST["qty"];
        $o->option_id = $item->option_id;
        

        $o->save();

        return back();
      }
    } else {
      return redirect('error')->with('error-title', 'Restaurants cannot make orders')->with("error-message", "Please sign out of your restaurant account before attempting to make an order.");
    }
  }

  public function removeItem($item,$choice){
    if(\Auth::check()) {
      $user = \Auth::user()->id;
    }

    $item = DB::table('orders')
        ->where('item_id',$item)
        ->where('completed',0)
        ->where('choice',$choice)
        ->delete();

    return redirect()->action('CustomerController@showcustomerconfirmation');
  }

  public function notConfirmed(){
    return redirect('error')->with('error-title', 'Error placing order')->with("error-message", "You have not confirmed your account, please check your email and confirm your account.");
  }

  public function checkConfirmed(){
    if(\Auth::check()) {
       $user = \Auth::user();
    }

    if(($user->confirmed != 1) && ($user->customer->is_guest != 1)){ //if they havent confirmed their email and not a guest
      return response('Unauthorized.', 401);
    } else {
      $orders = Orders::where('customer_id',$user->id)->where('completed','0')->get();
      
      foreach($orders as $items){
        $items->submit_time=Carbon::now();
        $items->completed='1';
        $items->quantity=$items->quantity;
        $items->special_instructions=$items->special_instructions;
        $items->save();
      }

      Event::fire(new OrderWasSubmitted($orders));

    }
  }
  public function submitOrder(){
    if(\Auth::check()) {
       $user = \Auth::user();
    }

   //dd($user->confirmed);

    $orders = Orders::where('customer_id',$user)->where('completed','0')->get();
      
    foreach($orders as $items){
      $items->submit_time=Carbon::now();
      $items->completed='1';
      $items->quantity=$items->quantity;
      $items->special_instructions=$items->special_instructions;
      $items->save();
    }

    Event::fire(new OrderWasSubmitted($orders));
  }


  public function orderconfirmandnotify($order_id){
    if(\Auth::check()) {
       $user = \Auth::user();
    }

    $order = Orders::where('order_id',$order_id)->get();

     return view('customercontent.orderconfirmed', compact('order'));
  }

  public function showcpeditaddress(){
          return view('customercontent.customer-profile-editaddress');
  }

  public function showcpeditorders(){
          return view('customercontent.customer-profile-editorders');
  }

  public function showcustomerprofile(){

    if(\Auth::check()) {
            $id = \Auth::user()->id;
       }
    $currentUser = User::where('id',$id)->first();
    $currentCustomer = Customer::where('id',$id)->first();

        return view('customercontent.customer-profile',compact('currentUser','currentCustomer'));
  }

  //Add restaurant to favourites
  public function addcustomerfavourite(User $restaurant){
    if(\Auth::check()) {
      $cust_id = \Auth::user()->id;
    }
    $rest_id = $restaurant->id;

    $addfavourite = new CustomerFavourites;
    $addfavourite->restaurant_id=$rest_id;
    $addfavourite->customer_id=$cust_id;
    $addfavourite->save();

    return redirect()->action('CustomerController@showcustomeroverview');
  }

  //Remove restaurant from favourites
  public function deletecustomerfavourite(User $restaurant){
    if(\Auth::check()) {
      $cust_id = \Auth::user()->id;
    }
    $rest_id = $restaurant->id;

    $deletefavourite = CustomerFavourites::where('customer_id',$cust_id)->where('restaurant_id',$rest_id);
    $deletefavourite->delete();

    return redirect()->action('CustomerController@showcustomeroverview');
  }



public function addfeedback(Request $request){
  if(\Auth::check()) {
          $id = \Auth::user()->id;
     }
//if the user is recorded as having made an order at this restaurant he/she can write a review
if(Orders::where('customer_id',\Auth::user()->id)->where('restaurant_id',$request->restaurant_id )->count()>0 && CustomerRatings::where('customer_id',\Auth::user()->id)->where('restaurant_id',$request->restaurant_id )->count()==0 )
{
  $currentUser = CustomerRatings::create([
          'restaurant_id' =>$request->restaurant_id ,
          'customer_id' => $id,
          'rating' => $request->rating,
          'comment' => $request->comment,
      ]);
      return redirect('/customeroverview')->with('status', 'Thanks for your time your Rating was successfully recorded');
}
else{
  return redirect('/customeroverview')->with('status', 'Our records either cannot confirm your previous experiences with this restaurant or have already recorded your rating for this restaurant ');
}

}

public function showfeedbackpage($rest_id){
  $data['rest_id'] = $rest_id;
  return view('rating.restaurantfeedback',$data);
}

}
