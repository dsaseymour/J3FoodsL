<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showcustomerlogin(){
          //return view('auth.login',['isRest' => false]);
    	$guestemail = 'temp' . rand() . '@temp.com';
    	return view('auth.login',compact('guestemail'));
  }

   public function showrestaurantlogin(){
          //return view('auth.login',['isRest' => true]);
   		return view ('auth.restaurantLogin');
  }

}
