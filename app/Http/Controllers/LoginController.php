<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showcustomerlogin(){
          //return view('auth.login',['isRest' => false]);
    	return view('auth.login');
  }
  
   public function showrestaurantlogin(){
          //return view('auth.login',['isRest' => true]);
   		return view ('auth.restaurantLogin');
  }
  
}
