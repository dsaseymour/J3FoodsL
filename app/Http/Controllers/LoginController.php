<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showcustomerlogin(){
		  $isRest = false;
          return view('auth.login',['isRest' => $isRest]);
  }
  
   public function showrestaurantlogin(){
			$isRest = true;
          return view('auth.login',['isRest' => $isRest]);
  }
  
}
