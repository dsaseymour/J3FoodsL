<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;
use App\CustomerFavourites;
use App\CustomerRatings;
use App\Hours;
use App\Items;
use App\Menu;
use App\Orders;
use App\Restaurant;
use App\User;



class MasterController extends Controller
{


  public function showhome(){
          return view('home');
  }

  public function showcustomerlogin(){
          return view('customercontent.customer-login');
  }

  public function showcustomerregister(){
          return view('customercontent.customer-registration');
  }

  public function showcustomeroverview(){
          return view('customercontent.customer-overview');
  }

  public function showcustomermenuoverview(){
          return view('customercontent.customer-menuoverview');
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
          return view('customercontent.customer-profile');
  }

  public function showrestauranthistory(){
          return view('restaurantcontent.restaurant-history');
  }

  public function showrestaurantlogin(){
          return view('restaurantcontent.restaurant-login');
  }

  public function showrestaurantmadmin(){
          return view('restaurantcontent.restaurant-menuadmin');
  }

  public function showrestaurantmedit(){
          return view('restaurantcontent.restaurant-menuedit');
  }

  public function showrestaurantmoverview(){
          return view('restaurantcontent.restaurant-menuoverview');
  }

  public function showrestaurantoverview(){
          return view('restaurantcontent.restaurant-overview');
  }

  public function showrestaurantprofile(){
          return view('restaurantcontent.restaurant-profile');
  }

  public function showrestaurantrestrictions(){
          return view('restaurantcontent.restaurant-profile-restrictions');
  }

  public function showrestaurantprofilehours(){
          return view('restaurantcontent.restaurant-profile-hours');
  }



  public function showrestaurantregister(){
          return view('restaurantcontent.restaurant-registration');
  }

  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

  public function showforgotpassword(){
          return view('login.forgottenpassword');
  }



  public function postCustomerLogin(Request $request)
  {


  }





}
