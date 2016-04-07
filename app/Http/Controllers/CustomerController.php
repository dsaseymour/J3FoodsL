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
          return view('customercontent.confirmationpage');
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
	/*
	$specialinstructions=NULL;
if($request->special_instructions!=NULL){
$specialinstructions=$request->special_instructions;
}
	$order=Orders::create([
          'item_id' => $request->item_id,
					'restaurant_id' => $request->restaurant_id,
					'customer_id' => $request->customer_id,
					'quantity' => $request->quantity,
					'specialinstructions' => $specialinstructions,
      ]);
		*/
//	Event::fire(new OrderWasSubmitted($order));

$fullorderdescription=DB::table('orders')
            ->where('order_id', '=', '1')
						->where('restaurant_id', '=', '1')
						->where('customer_id', '=', '44')
						->get();

$summary=$this->createOrderSummary($fullorderdescription);
return view('login.forgottenpassword')->with(['order'=>$fullorderdescription[0],'fullorderdescription'=>$summary ]);

//  return redirect('/customeroverview')->with('status', 'Your Order has been created! Its unique id is: '.$order->order_id);

}

public function createOrderSummary($orderset){
//item name array
//option name array
//choice name array
//special instructions array
$itemname_set;
$optionname_set;
$choicename_set;
$specialinstruction_set;
$itemprice_set;
$orderquantity_set;
$i=0;

foreach($orderset as $order){
		 $itemname_set[$i]=$order->item_id;
		 $optionname_set[$i]=$order->option_id;
		 $choicename_set[$i]=$order->choice_id;
		 $specialinstruction_set[$i]=$order->special_instructions;
		 $orderquantity_set[$i]=$order->quantity;
		 $i++;
}

$orderquantity_set=array_reverse($orderquantity_set);
for($j = $i-1; $j >= 0; $j--){
$itemsobject=DB::table('items')
->where('item_id',$itemname_set[$j])->where('rest_id', $order->restaurant_id)
->first();
$itemname_set[$j]=$itemsobject->name;
$itemprice_set[$j]=$itemsobject->price;

$optionsobject=DB::table('options')->where('id',$optionname_set[$j])->first();
if($optionsobject){$optionname_set[$j]=$optionsobject->name;}
else{$optionname_set[$j]=NULL;}

$choiceobject=DB::table('option_choices')->where('choice_id',$choicename_set[$j])->first();
if($choiceobject){$choicename_set[$j]=$choiceobject->name;}
else{$choicename_set[$j]=NULL;}
}
return(['itemname_set'=>$itemname_set,'optionname_set'=>$optionname_set,'choicename_set'=>$choicename_set,'specialinstruction_set'=>$specialinstruction_set,'orderquantity_set'=>$orderquantity_set,'itemprice_set'=>$itemprice_set]);
}


}
