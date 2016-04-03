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
    
    **ONLY ADD NEW FEILDS BELOW , NOTHING ABOVE EMAIL/NAME
    
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
    $updateHours = new Hours;
    $updateHours->rest_ID = $id;
    $updateHours->day_ID = $request->mon;
    $updateHours->open = $request->mon_open;
    $updateHours->open_time = $request->mon_open_time;
    $updateHours->close_time = $request->mon_close_time;
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

    
    $updateItem = Item::find($item->item_id);
    $updateItem->category_id = $request->category;
    $updateItem->price = $request->price;
    $updateItem->name = $request->name;
    $updateItem->image = $request->image;
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
