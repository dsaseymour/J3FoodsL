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
use Carbon\Carbon;
use DB;
use Validator;
use Event;
use App\Events\OrderWasSubmitted;


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

		if($data['email'] != $email){	//need to check if they didnt change email
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
		$restaurants = Restaurant::get();
    return view('customercontent.customer-overview',compact('restaurants'));
  }

    public function sortrestaurantlistalphabetically(){
    $restaurants = Restaurant::orderBy('companyname', 'desc')->get();
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
    $o = new Orders;
    $item = Item::find($_POST["itemid"]);
    $o->customer_id = \Auth::user()->id;
    $o->item_id = $item->item_id;
    $o->restaurant_id = $item->restaurant->id;
    $o->quantity = $_POST["qty"];
    $o->option_id = $item->option_id;
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

    $o->save();
    
    return back();
  }

  public function removeItem($item){
    if(\Auth::check()) {
       $user = \Auth::user()->id;
    }

    $order = Orders::where('customer_id',$user)->where('completed','0')->where('item_id',$item)->get();

    foreach($order as $items){
      $items->delete();
    }

    return redirect()->action('CustomerController@showcustomerconfirmation');    
  }

  public function submitOrder(){
    if(\Auth::check()) {
       $user = \Auth::user()->id;
    }

    $orders = Orders::where('customer_id',$user)->where('completed','0')->get();

    foreach($orders as $items){
      $items->submit_time=Carbon::now();
      $items->completed='1';
      $items->quantity=$items->quantity;
      $items->special_instructions=$items->special_instructions;
      $items->save();
    }
  }


  public function orderconfirmandnotify($order_id){
    
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

public function createOrder(Request $request){
	$order=Orders::create([
          'item_id' => $request->item_id,
					'restaurant_id' => $request->restaurant_id,
					'customer_id' => $request->customer_id,
					'quantity' => $request->quantity,
					'special_instructions' => $request->special_instructions,
      ]);
	Event::fire(new OrderWasSubmitted($order));
  return redirect('/customeroverview')->with('status', 'Your Order has been created! Its unique id is: '.$order->order_id);
}

}
