<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function showsethours(){
      $dayNumbers = array(1,2,3,4,5,6,7);
      $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");
      $dayNames = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      return view('restaurantcontent.restaurant-sethours',compact('dayNumbers','dayStrings', 'dayNames'));
    }


    public function storehours(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $this->setDatabaseWithNewHours($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

    protected function setDatabaseWithNewHours(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");

      $parameters = $request->request->all();
      //fetched the parameters array from the request object that can take a string as an argument
      foreach ($dayStrings as $day){
        $updateHours = new Hours;
        $updateHours->rest_ID = $id;
        $updateHours->day_ID = $parameters[$day];
        $updateHours->open = $parameters[$day . '_open'];
        $updateHours->open_time = $parameters[$day . '_open_time'] + $parameters[$day . '_open_XM'] . ":00:00";
        $updateHours->close_time = $parameters[$day . '_close_time'] + $parameters[$day . '_close_XM'] . ":00:00";
        $updateHours->save();
      }
    }

    public function updatehours(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $this->updateDatabaseWithNewHours($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

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

    public function updaterestrictions(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      $this->updateDatabaseWithNewResrtictions($request);
      return redirect()->action('RestaurantController@showrestaurantoverview');
    }

    protected function updateDatabaseWithNewResrtictions(Request $request){
      if(\Auth::check()) {
        $id = \Auth::user()->id;
      }
      
      $updateRestaurant = Restaurant::find($id);
      $updateRestaurant->max_order_price = $request->max_price;
      $updateRestaurant->allow_guests = $request->allow_guests;
      $updateRestaurant->save();
    }

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

    public function deleteitem(Item $item){

      $item->delete();
      return redirect()->action('RestaurantController@showrestaurantmoverview');

    }

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
      if($request->option_type == "textbox"){

        if($updateItem->option_id != null){
          if($updateItem->option->type == "text"){
              $textOption = Option::where('item_id',$item->item_id)->where('type',"text")->first(); //saving text option
           }else{ //had a different option, need to remove it and create a new one
            $textOption = new Option;
            $updateItem->option->delete();
          }
        }else{
           $textOption = new Option; //saving new text option
         }
         $textOption->item_id = $updateItem->item_id;
         $textOption->type = "text";
         $textOption->name = $request->text_option;
         $textOption->save();

         $updateItem->option_id = $textOption->id;
       } else if($request->option_type == "combobox"){

        if($updateItem->option_id != null){
          if($updateItem->option->type == "combo"){
            $comboBox =  Option::where('item_id',$item->item_id)->where('type',"combo")->first(); //saving combo option
          }else{
            $comboBox = new Option;
            $updateItem->option->delete();
          }
        }else{
            $comboBox = new Option; //saving combo option
          }

          $comboBox->item_id = $updateItem->item_id;
          $comboBox->type = "combo";
          $comboBox->name = $request->combo_name;
          $comboBox->save();

          if($updateItem->option_id != null){
            if($updateItem->option->type == "combo"){
              $comboOptions =  OptionChoice::where('option_id',$comboBox->id)->where('choice_id',"1")->first();
              $comboOptions2 = OptionChoice::where('option_id',$comboBox->id)->where('choice_id',"2")->first();
            }else{
              $comboOptions = new OptionChoice;
              $comboOptions2 = new OptionChoice;
            }
          }else{
            $comboOptions = new OptionChoice;
            $comboOptions2 = new OptionChoice;
          }
          
          $comboOptions->option_id = $comboBox->id;
          $comboOptions->choice_id = 1;
          $comboOptions->name = $request->combo_1;
          $comboOptions->choice_order = 1;
          $comboOptions->save();

          $comboOptions2->option_id = $comboBox->id;
          $comboOptions2->choice_id = 2;
          $comboOptions2->name = $request->combo_2;
          $comboOptions2->choice_order = 2;
          $comboOptions2->save();

          $updateItem->option_id = $comboBox->id;
        }else if($request->option_type == "checkbox"){

          if($updateItem->option_id != null){
            if($updateItem->option->type == "check"){
              $checkOption =  Option::where('item_id',$item->item_id)->where('type',"check")->first(); //saving checkbox option
            }else{
              $checkOption = new Option;
              $updateItem->option->delete();
            }
          }else{
            $checkOption = new Option; //saving combo option
          }

          $checkOption->item_id = $updateItem->item_id;
          $checkOption->type = "check";
          $checkOption->name = $request->check_name;
          $checkOption->save();

          if($updateItem->option_id != null){
            if($updateItem->option->type == "check"){
              $checkOptions = OptionChoice::where('option_id',$checkOption->id)->where('choice_id',"1")->first();
              $checkOptions2 = OptionChoice::where('option_id',$checkOption->id)->where('choice_id',"2")->first();
            }else{
              $checkOptions = new OptionChoice;
              $checkOptions2 = new OptionChoice;
            }
          }else{
            $checkOptions = new OptionChoice;
            $checkOptions2 = new OptionChoice;
          }

          $checkOptions->option_id = $checkOption->id;
          $checkOptions->choice_id = 1;
          $checkOptions->name = $request->check_1;
          $checkOptions->choice_order = 1;
          $checkOptions->save();

          $checkOptions2->option_id = $checkOption->id;
          $checkOptions2->choice_id = 2;
          $checkOptions2->name = $request->check_2;
          $checkOptions2->choice_order = 2;
          $checkOptions2->save();

          $updateItem->option_id = $checkOption->id;
        }

      }else if ($updateItem->option_id != null){//delete the saved option if they unchecked has options
        $updateItem->option->delete();
      }

      $updateItem->save();
      return redirect()->action('RestaurantController@showrestaurantmoverview');
    }

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

      $comboOptions = new OptionChoice;
      $comboOptions->option_id = $comboBox->id;
      $comboOptions->choice_id = 1;
      $comboOptions->name = $request->combo_1;
      $comboOptions->choice_order = 1;
      $comboOptions->save();

      $comboOptions2 = new OptionChoice;
      $comboOptions2->option_id = $comboBox->id;
      $comboOptions2->choice_id = 2;
      $comboOptions2->name = $request->combo_2;
      $comboOptions2->choice_order = 2;
      $comboOptions2->save();

      $newItem->option_id = $comboBox->id;
    }else if ($request->option_type == "checkbox"){

      $checkOption = new Option; //saving checkbox option
      $checkOption->item_id = $newItem->item_id;
      $checkOption->type = "check";
      $checkOption->name = $request->check_name;
      $checkOption->save();

      $checkOptions = new OptionChoice;
      $checkOptions->option_id = $checkOption->id;
      $checkOptions->choice_id = 1;
      $checkOptions->name = $request->check_1;
      $checkOptions->choice_order = 1;
      $checkOptions->save();

      $checkOptions2 = new OptionChoice;
      $checkOptions2->option_id = $checkOption->id;
      $checkOptions2->choice_id = 2;
      $checkOptions2->name = $request->check_2;
      $checkOptions2->choice_order = 2;
      $checkOptions2->save();
      $newItem->option_id = $checkOption->id;
    }
    $newItem->save();
  }
  return redirect()->action('RestaurantController@showrestaurantmoverview');
}


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


public function viewreviews(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;

  }
  $reviews = DB::table('customer_ratings')
  ->where('restaurant_id',$id)
  ->get();
  
  return view('restaurantcontent.restaurant-view-reviews',compact('reviews'));

}

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

public function restaurantlogin(Request $request){
  return view('restaurantcontent.restaurant-login');
}

public function showrestaurantmadmin(){
  return view('restaurantcontent.restaurant-menuadmin');
}

public function showrestaurantmedit(){

  return view('restaurantcontent.restaurant-menuedit');
}

public function showrestaurantoverview(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }

  $restaurant = Restaurant::where('id',$id)->first();

  $completeorders = Orders::where('restaurant_id',$id)->whereNull('time_out')->where('completed','1')->get();
  $uniqueorders = Orders::where('restaurant_id',$id)->whereNull('time_out')->where('completed','1')->groupBy('order_id')->orderBy('submit_time','ASC')->get();

  return view('restaurantcontent.restaurant-overview',compact('restaurant','completeorders', 'uniqueorders'));

}

public function showrestaurantprofile(){
  if(\Auth::check()) {
    $id = \Auth::user()->id;
  }
  $currentUser = User::where('id',$id)->first();
  $currentRestaurant = Restaurant::where('id',$id)->first();

  return view('restaurantcontent.restaurant-profile',compact('currentUser','currentRestaurant'));
}

public function showrestaurantrestrictions(){
  return view('restaurantcontent.restaurant-profile-restrictions');
}

public function showrestaurantprofilehours(){
  $dayNumbers = array(1,2,3,4,5,6,7);
  $dayStrings = array("mon","tue","wed","thur","fri","sat","sun");
  $dayNames = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  return view('restaurantcontent.restaurant-profile-hours', compact('dayNumbers', 'dayStrings', 'dayNames'));
}

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
}