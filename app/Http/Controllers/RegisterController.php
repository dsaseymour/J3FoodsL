<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    public function showcustomerregister(){
          return view('customercontent.customer-registration');
  }
  
   public function showrestaurantregister(){
          return view('restaurantcontent.restaurant-registration');
  }
  
  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

  
  
  
}
