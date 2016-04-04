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
use DB;
use Validator;

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
      return view('restaurantcontent.restaurant-sethours');
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
      //MONDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->mon;
      $updateHours->open = $request->mon_open;
      $updateHours->open_time = $request->mon_open_time + $request->mon_open_XM;
      $updateHours->close_time = $request->mon_close_time + $request->mon_close_XM;;
      $updateHours->save();
      //TUESDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->tue;
      $updateHours->open = $request->tue_open;
      $updateHours->open_time = $request->tue_open_time + $request->tue_open_XM;
      $updateHours->close_time = $request->tue_close_time + $request->tue_close_XM;;
      $updateHours->save();
      //WEDNESDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->wed;
      $updateHours->open = $request->wed_open;
      $updateHours->open_time = $request->wed_open_time + $request->wed_open_XM;
      $updateHours->close_time = $request->wed_close_time + $request->wed_close_XM;;
      $updateHours->save();
      //THURSDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->thur;
      $updateHours->open = $request->thur_open;
      $updateHours->open_time = $request->thur_open_time + $request->thur_open_XM;
      $updateHours->close_time = $request->thur_close_time + $request->thur_close_XM;;
      $updateHours->save();
      //FRIDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->fri;
      $updateHours->open = $request->fri_open;
      $updateHours->open_time = $request->fri_open_time + $request->fri_open_XM;
      $updateHours->close_time = $request->fri_close_time + $request->fri_close_XM;;
      $updateHours->save();
      //SATURDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->sat;
      $updateHours->open = $request->sat_open;
      $updateHours->open_time = $request->sat_open_time + $request->sat_open_XM;
      $updateHours->close_time = $request->sat_close_time + $request->sat_close_XM;;
      $updateHours->save();
      //SUNDAY
      $updateHours = new Hours;
      $updateHours->rest_ID = $id;
      $updateHours->day_ID = $request->sun;
      $updateHours->open = $request->sun_open;
      $updateHours->open_time = $request->sun_open_time + $request->sun_open_XM;
      $updateHours->close_time = $request->sun_close_time + $request->sun_close_XM;;
      $updateHours->save();
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

    

    $updateItem->save();
    return redirect()->action('RestaurantController@showrestaurantmoverview');

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
    return redirect()->action('RestaurantController@showrestaurantmoverview');

  }

  public function showrestaurantmoverview(){
    if(\Auth::check()) {
      $id = \Auth::user()->id;
    }
    $restaurantInfo = Restaurant::where('id',$id)->first();
    $restaurant = Restaurant::where('id',$id)->first();
    return view('restaurantcontent.restaurant-menuoverview',compact('restaurant','restaurantInfo'));
  }

  public function restaurantlogin(Request $request){
    return view('restaurantcontent.restaurant-login');
  }

  public function showrestauranthistory(){
    return view('restaurantcontent.restaurant-history');
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


    return view('restaurantcontent.restaurant-overview',compact('restaurant'));
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
    return view('restaurantcontent.restaurant-profile-hours');
  }

}
