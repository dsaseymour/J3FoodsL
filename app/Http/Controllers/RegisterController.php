<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    public function showcustomerregister(){
          return view('auth.register',['isRest' => false]);
  }
  
   public function showrestaurantregister(){
          return view('auth.register',['isRest' => true]);
  }
  
  public function showrestaurantregisterinfo(){
          return view('restaurantcontent.restaurant-registration');
  }
  
  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

  
  
  
}
