<?php

/*
  Handles all the server side interaction which has to do with the restaurant flow
*/

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Restaurant;
use App\Customer;
use App\User;
use App\Hours;
use App\Item;
use App\Category;
use App\Special;
use App\Orders;
use Carbon\Carbon;
use App\Option;
use App\OptionChoice;
use DB;
use Validator;
use App\Events\OrderWasCanceled;
use Event;
use Illuminate\Http\Request;
use Mail;

class RestaurantController extends Controller
{

  public function __construct(){
   $this->middleware('auth');
 }

    /**
    Updates the user info with the data eneterd in the update user info page
  */
    public function updateinfo(Request $request){
      $validator = $this->validaterestaurantupdate($request->all());

      if ($validator->fails()) {
        $this->throwValidationException(
         $request, $validator
         );
      }
      $this->updateDatabaseWithNewInfo($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

  /**
    Updates the database with the updated info of the restaurant

  */
    protected function updateDatabaseWithNewInfo(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }

      $updateUser = User::find($id);
      $updateUser->name = $request->name;
      if($updateUser->email != $request->email){
        $updateUser->confirmed=0;
        $ccode=$this->resendEmailConfirmationTo($request->email);
        $updateUser->confirmation_code=$ccode;
      }
      $updateUser->email = $request->email;
      $updateUser->save();

      $updateRestaurant = Restaurant::find($id);
      $updateRestaurant->companyname = $request->companyname;
      $updateRestaurant->address = $request->address;
      $updateRestaurant->province = $request->province;
      $updateRestaurant->city = $request->city;
      $updateRestaurant->postalcode = $request->postalcode;
      $updateRestaurant->phoneno = $request->phoneno;
      $updateRestaurant->image = $request->image;
      $updateRestaurant->save();
    }

    /**
    * Validates the restaurants profile update
    * @param $data the data which holds the profile update information
    */
    protected function validaterestaurantupdate(array $data){
      if(\Auth::check()) {
        $email = \Auth::user()->email;
      }

      if($data['email'] != $email){
        return Validator::make($data, [
          'email' => 'required|email|max:255|unique:users',
          'name' => 'required|max:255',
          'companyname' => 'required',
          'address' => 'required',
          'province' => 'required',
          'city' => 'required',
          'postalcode' => 'required | max:7 | min:6',
          'phoneno' => 'required | max:13',
          ]);
      } else {
        return Validator::make($data, [
          'email' => 'required|email|max:255',
          'name' => 'required|max:255',
          'companyname' => 'required',
          'address' => 'required',
          'province' => 'required',
          'city' => 'required',
          'postalcode' => 'required | max:7 | min:6',
          'phoneno' => 'required | max:13',
          ]);
      }
    }

    /**
     * [resendEmailConfirmationTo sends an account verification email to the entered address ]
     * @param  String $email the email address of the user whose account is to be confirmed
     * @return String $confirmation_code the confirmation code that is used in the account verification email
     */
    public function resendEmailConfirmationTo($email){
         $confirmation_code=str_random(30);
         $data=['confirmation_code'=>$confirmation_code];
         Mail::send('email.registrationconfirmation',$data, function($message) use ($email){
             $message->to($email)->subject('Verify your email address');
         });
         return $confirmation_code;
     }

    /**
     * Closes the given restaurant
     * @param $restaurant the restaurant to close
     */
    public function closerestaurant(Restaurant $restaurant){
      $open_value = $restaurant->is_open;
      if ($open_value == 0){
        $restaurant->is_open = 1;
      } else {
        $restaurant->is_open = 0;
      }
      $restaurant->save();
      return redirect()->action('RestaurantController@showrestaurantoverview');

    }

    /**
    * Shows the set hours page to the restaurant
    */
    public function showsethours(){
      $dayNumbers = array(1,2,3,4,5,6,7);
      $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");
      $dayNames = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      return view('restaurantcontent.restaurant-sethours',compact('dayNumbers','dayStrings', 'dayNames'));
    }

    /**
     * [userprofileresendfunction calls the resendEmailConfirmation function to send an email and updates the user to have the newly generated confirmation code]
     * @return View redirects the user to the restaurant profile page after the account verification email has been sent
     */
    public function userprofileresendfunction(){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
        $updateUser = User::find($id);
       $ccode=$this->resendEmailConfirmationTo($updateUser->email);
       $updateUser->confirmation_code=$ccode;
       $updateUser->save();
       return redirect('/restaurantprofile')->with('status', 'Your Account Verification Email was successfully sent. Be sure to check your spam folder. ');
       }
    }

    /**
    * Stores the restaurants hours
    * @param $request The hours to set on the restaurant
    */
    public function updatehours(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $this->updateDatabaseWithNewHours($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

    /**
    * Stores the updated store hours in the database
    * @param $request The updated hours to store
    */

    protected function updateDatabaseWithNewHours(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");

      $parameters = $request->request->all();

      //Using DB query because eloquent doesn't support composite keys. Can't fetch the correct Hours object with eloquent
      foreach ($dayStrings as $day){
        DB::table('hours')
        ->where('rest_ID',$id)
        ->where('day_ID',$parameters[$day])
        ->update([
          'open' => $parameters[$day . '_open'],
          'open_time' => $parameters[$day . '_open_time'] + $parameters[$day . '_open_XM'] . ":00:00",
          'close_time' => $parameters[$day . '_close_time'] + $parameters[$day . '_close_XM'] . ":00:00"
          ]);
      }
    }

    /**
    * Updates the order restrictions of the restaurant
    * @param $request The new restrictions of the restaurant
    */
    public function updaterestrictions(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $this->updateDatabaseWithNewResrtictions($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

    /**
    * Updates the database with the new restrictions
    * @param $request The new order restrictions
    */
    protected function updateDatabaseWithNewResrtictions(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }

      $updateRestaurant = Restaurant::find($id);
      $updateRestaurant->max_order_price = $request->max_price;
      $updateRestaurant->allow_guests = $request->allow_guests;
      $updateRestaurant->save();
    }

    /**
    * Add a new category to the restaurant list
    * @param $request Holds the category to add
    */
    public function addcategory(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }

      $newCategory = new Category;
      $newCategory->category_name = $request->category;
      $newCategory->rest_id = $id;
      $newCategory->save();
      return redirect()->action('RestaurantController@showrestaurantmoverview');

    }

    /**
    * Deletes the given category from the database
    * @param $category The category to delete from the database
    */
    public function deletecategory(Category $category){

      $category->delete();
      return redirect()->action('RestaurantController@showrestaurantmoverview');

    }

    /**
    * Deletes an item from the database
    * @param $item The item to delete from the database
    */
    public function deleteitem(Item $item){

      $item->delete();
      return redirect()->action('RestaurantController@showrestaurantmoverview');

    }

    /**
    * Edits the given item with the new given values
    * @param $item The item to update
    * @param $request The request which holds the new information for the item
    */
    public function edititem(Item $item, Request $request ){

      if(\Auth::check()) {
      $restId = \Auth::user()->id;//get id of restaurant
    }

    $updateItem = Item::find($item->item_id);
    $updateItem->category_id = $request->category;
    $updateItem->price = $request->price;
    $updateItem->name = $request->name;
    $updateItem->image = $request->image;//update item with new info

    if ($updateItem->spec_id != null){//if the item was on special before
      $oldSpecial = $updateItem->special;
      if ($request->is_special == null){//if the item is not on special anymore
        $oldSpecial->delete();
      }else{//else just update the price
        $oldSpecial->spec_price =$request->special_price;
        $oldSpecial->save();
      }
    }else{//else the item wasnt on special before
      if ($request->is_special == "on"){//if its on special now, create a new special
        $special = new Special;
        $special->rest_id = $restId;
        $special->item_id = $item->item_id;
        $special->spec_price = $request->special_price;
        $special->save();
        $updateItem->spec_id = $special->id;
      }
    }


    if ($request->are_options == "on"){
      if($updateItem->option_id != null){
        $updateItem->option->delete();
      }
      if($request->option_type == "textbox"){
        if($request->text_option != ""){
         $textOption = new Option; //saving new text option
         $textOption->item_id = $updateItem->item_id;
         $textOption->type = "text";
         $textOption->name = $request->text_option;
         $textOption->save();

         $updateItem->option_id = $textOption->id;
       }
     } else if($request->option_type == "combobox"){

      if($request->combo_name != ""){
        if($request->combo_2 != "" || $request->combo_1 != ""){
          $comboBox = new Option; //saving combo option
          $comboBox->item_id = $updateItem->item_id;
          $comboBox->type = "combo";
          $comboBox->name = $request->combo_name;
          $comboBox->save();

          for($boxnum = 1; $boxnum < 7 ; $boxnum++){
            if($request->{'combo_' . $boxnum} != ""){
              $comboOptions = new OptionChoice;
              $comboOptions->option_id = $comboBox->id;
              $comboOptions->choice_id = $boxnum;
              $comboOptions->name = $request->{'combo_' . $boxnum};
              $comboOptions->choice_order = $boxnum;
              $comboOptions->save();
            }
          }
          $updateItem->option_id = $comboBox->id;
        }
      }
    }else if($request->option_type == "checkbox"){
      if($request->check_name != ""){
        if($request->check_2 != "" || $request->check_1 != ""){
          $checkOption = new Option; //saving combo option
          $checkOption->item_id = $updateItem->item_id;
          $checkOption->type = "check";
          $checkOption->name = $request->check_name;
          $checkOption->save();

          for($boxnum = 1; $boxnum < 7 ; $boxnum++){
            if($request->{'check_' . $boxnum} != ""){
              $checkOptions = new OptionChoice;
              $checkOptions->option_id = $checkOption->id;
              $checkOptions->choice_id = $boxnum;
              $checkOptions->name = $request->{'check_' . $boxnum};
              $checkOptions->choice_order = $boxnum;
              $checkOptions->save();
            }
          }
          $updateItem->option_id = $checkOption->id;
        }
      }
    }

      }else if ($updateItem->option_id != null){//delete the saved option if they unchecked has options
        $updateItem->option->delete();
      }

      $updateItem->save();
      return redirect()->action('RestaurantController@showrestaurantmoverview');
    }


    /**
    * Saves the order of the categories
    * @param $request The requets which holds the information about the category order
    */
    public function savecategoryorder(Request $request){
      $categoryList = $request->testdata;

      $count = 1;

      foreach ($categoryList as $categoryID){
        $category = Category::find($categoryID);
        $category->category_order = $count;
        $category->save();
        $count++;
      }

    }


    /**
    * Adds the given item to the menu
    * @param $request Holds the informtion of the item to add to the database
    */

    public function additemtomenu(Request $request){

      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }

      $newItem = new Item;
      $newItem->price = $request->price;
      $newItem->name = $request->name;
      $newItem->image = $request->image;
      $newItem->rest_id = $id;
      $newItem->category_id = $request->category;
      $newItem->save();

      if ($request->are_options == "on"){

        if($request->option_type == "textbox"){
      $textOption = new Option; //saving text option
      $textOption->item_id = $newItem->item_id;
      $textOption->type = "text";
      $textOption->name = $request->text_option;
      $textOption->save();

      $newItem->option_id = $textOption->id;
    }else if ($request->option_type == "combobox"){

      $comboBox = new Option; //saving combo option
      $comboBox->item_id = $newItem->item_id;
      $comboBox->type = "combo";
      $comboBox->name = $request->combo_name;
      $comboBox->save();

      for($boxnum = 1; $boxnum < 7 ; $boxnum++){
        if($request->{'combo_' . $boxnum} != ""){
          $comboOptions = new OptionChoice;
          $comboOptions->option_id = $comboBox->id;
          $comboOptions->choice_id = $boxnum;
          $comboOptions->name = $request->{'combo_' . $boxnum};
          $comboOptions->choice_order = $boxnum;
          $comboOptions->save();
        }
      }

      $newItem->option_id = $comboBox->id;
    }else if ($request->option_type == "checkbox"){

      $checkOption = new Option; //saving checkbox option
      $checkOption->item_id = $newItem->item_id;
      $checkOption->type = "check";
      $checkOption->name = $request->check_name;
      $checkOption->save();

      for($boxnum = 1; $boxnum < 7 ; $boxnum++){
        if($request->{'check_' . $boxnum} != ""){
          $checkOptions = new OptionChoice;
          $checkOptions->option_id = $checkOption->id;
          $checkOptions->choice_id = $boxnum;
          $checkOptions->name = $request->{'check_' . $boxnum};
          $checkOptions->choice_order = $boxnum;
          $checkOptions->save();
        }
      }

    }
  }

  $newItem->save();
  return redirect()->action('RestaurantController@showrestaurantmoverview');
}

  /**
  * Shows the history of the restaurant which gives an overview of how the business is doing
  */
  public function showrestauranthistory(){
    if(\Auth::check()) {
      $id = \Auth::user()->id;
    }

    $currentmonth = Carbon::now()->month;
    $currentmonthorders=Orders::where('restaurant_id',$id)->whereNotNull('time_out')->where('canceled','0')->whereMonth('time_out','=',$currentmonth)->get();
    $lastmonthorders=Orders::where('restaurant_id',$id)->whereNotNull('time_out')->where('canceled','0')->whereMonth('time_out','=',$currentmonth-1)->get();
    $twomonthorders=Orders::where('restaurant_id',$id)->whereNotNull('time_out')->where('canceled','0')->whereMonth('time_out','=',$currentmonth-2)->get();
    $threemonthorders=Orders::where('restaurant_id',$id)->whereNotNull('time_out')->where('canceled','0')->whereMonth('time_out','=',$currentmonth-3)->get();

    return view('restaurantcontent.restaurant-history', compact('currentmonthorders','lastmonthorders','twomonthorders','threemonthorders'));
  }

  /**
  * Shows the view which has all the restaurants reviews
  */
public function viewreviews(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;

  }
  $reviews = DB::table('customer_ratings')
  ->where('restaurant_id',$id)
  ->get();

  return view('restaurantcontent.restaurant-view-reviews',compact('reviews'));

}

/**
* Toggles whether a review should be included on the restaurants page
* @param $reviewer The review that should be seen or unseen
*/
public function toggleshowingreview(User $reviewer){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }

  $review = DB::table('customer_ratings')
  ->where('customer_id',$reviewer->id)
  ->where('restaurant_id',$id)
  ->first();

  $isDisplaying = ($review->is_displaying == 0 ? 1 : 0);

  DB::table('customer_ratings')
  ->where('customer_id',$reviewer->id)
  ->where('restaurant_id',$id)
  ->update(['is_displaying' => $isDisplaying]);

  return redirect()->action('RestaurantController@viewreviews');

}


/**
* Deletes a review from the database
* @param $reviewer The review to delete
*/
public function deletereview(User $reviewer){

  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }


  DB::table('customer_ratings')
  ->where('customer_id',$reviewer->id)
  ->where('restaurant_id',$id)
  ->delete();

  return redirect()->action('RestaurantController@viewreviews');
}

/**
* Shows the restaurant menu to the restaurant user
*/

public function showrestaurantmoverview(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }

  $restaurantInfo = Restaurant::where('id',$id)->first();
  $restaurant = Restaurant::where('id',$id)->first();
  $allReviews = DB::table('customer_ratings')
  ->where('restaurant_id',$id)
  ->where('is_displaying', 1)
  ->get();


  $numReviews = count($allReviews);
  $reviews = array();
  if($numReviews > 1){
    foreach( array_rand($allReviews, 2) as $k ) {
      $reviews[] = $allReviews[$k];
    }
  }else if($numReviews ==1){
    $reviews[0] = $allReviews[0];
  }else{

  }

  $average = DB::table('restaurant_average_ratings')
  ->where('restaurant_id',$id)
  ->first();

  if($average != null){
    $averageReview = round($average->AVG_RATING,1);
  }else{
    $averageReview = "N/A";
  }

  return view('restaurantcontent.restaurant-menuoverview',compact('restaurant','restaurantInfo','reviews','averageReview'));
}

/**
* Shows the login page to the restaurant
*/
public function restaurantlogin(Request $request){
  return view('restaurantcontent.restaurant-login');
}

/**
* Shows the admin page for the restaurant
*/
public function showrestaurantmadmin(){
  return view('restaurantcontent.restaurant-menuadmin');
}

/**
* Shows the restaurant edit menu
*/
public function showrestaurantmedit(){

  return view('restaurantcontent.restaurant-menuedit');
}

/**
* Shows the restaurant menu overview
*/

public function showrestaurantoverview(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }
  $user = \Auth::user();
  $restaurant = Restaurant::where('id',$id)->first();
  $completeorders = Orders::where('restaurant_id',$id)->whereNull('time_out')->where('completed','1')->get();
  $uniqueorders = Orders::where('restaurant_id',$id)->whereNull('time_out')->where('completed','1')->groupBy('order_id')->orderBy('submit_time','ASC')->get();

if(\Request::ajax()){
  return view('restaurantcontent.restaurant-refreshoverview',compact('restaurant','completeorders', 'uniqueorders', 'user'));
    }
  return view('restaurantcontent.restaurant-overview',compact('restaurant','completeorders', 'uniqueorders', 'user'));

}


/**
* Shows the restuarant edit information page
*/
public function showrestaurantprofile(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }
  $currentUser = User::where('id',$id)->first();
  $currentRestaurant = Restaurant::where('id',$id)->first();

  return view('restaurantcontent.restaurant-profile',compact('currentUser','currentRestaurant'));
}

/**
* Shows the view which lets the restaurant set order restrictions
*/
public function showrestaurantrestrictions(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }
  $currentUser = User::where('id',$id)->first();
  $currentRestaurant = Restaurant::where('id',$id)->first();

  return view('restaurantcontent.restaurant-profile-restrictions',compact('currentUser','currentRestaurant'));
}

/**
* Shows the restaurants hours of operation
*/
public function showrestaurantprofilehours(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }
  $dayNumbers = array(1,2,3,4,5,6,7);
  $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");
  $dayNames = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $openFlags = array();
  $open_times = array();
  $close_times = array();

  //Using DB query because eloquent doesn't support composite keys. Can't fetch the correct Hours object with eloquent
  foreach ($dayNumbers as $dayid){
    $is_open = DB::table('hours')
    ->where('rest_ID',$id)
    ->where('day_ID',$dayid)
    ->pluck('open');
    $openFlags[] = $is_open;
    if($is_open[0] == 1){
      $open_time = DB::table('hours')
      ->where('rest_ID',$id)
      ->where('day_ID',$dayid)
      ->pluck('open_time');
      $close_time = DB::table('hours')
      ->where('rest_ID',$id)
      ->where('day_ID',$dayid)
      ->pluck('close_time');
      $open_times[] = intval($open_time[0]);
      $close_times[] = intval($close_time[0]);
    } else{
      $open_times[] = -1;
      $close_times[] = -1;
    }
  }

  return view('restaurantcontent.restaurant-profile-hours',
    compact('dayNumbers', 'dayStrings', 'dayNames',
      'openFlags', 'open_times','close_times'));

}

/**
* Completed the given order 
* @param $order_id The order to complete
*/
public function finishorder($order_id){
  $orders = Orders::where('order_id',$order_id)->get();

  foreach($orders as $items){
    $items->submit_time=$items->submit_time;
    $items->completed=$items->completed;
    $items->quantity=$items->quantity;
    $items->special_instructions=$items->special_instructions;
    $items->time_out=Carbon::now();
    $items->save();
  }

  return redirect()->action('RestaurantController@showrestaurantoverview');
}

  /**
  * Cancels the given order
  * @param $order_id the order to cancel
  */
public function cancelorder($order_id){
  $orders = Orders::where('order_id',$order_id)->get();

  foreach($orders as $items){
    $items->submit_time=$items->submit_time;
    $items->completed=$items->completed;
    $items->quantity=$items->quantity;
    $items->special_instructions=$items->special_instructions;
    $items->time_out=Carbon::now();
    $items->canceled='1';
    $items->save();
  }
  Event::fire(new OrderWasCanceled($orders));

  return redirect()->action('RestaurantController@showrestaurantoverview')->with('status', 'Your Order has been canceled ');

}

  /**
  *Shows the details of the given order
  *@param $order_id The order to view more details of
  */
  public function showDetails($order_id){
    $orders = Orders::where("order_id", $order_id)->get();
    return view("includes.order-details-modal", compact("orders"));
  }
}
