<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    public function showcustomerregister(){
          //return view('auth.register',['isRest' => false]);
          return view('auth.register');
  }
  
   public function showrestaurantregister(){
          //return view('auth.register',['isRest' => true]);
          return view('auth.restaurantRegister');
  }
  
  public function showrestaurantregisterinfo(){
          return view('restaurantcontent.restaurant-registration');
  }
  
  //Confirmation page thanks for coming!!
  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

  
  
  
}
