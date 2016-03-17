<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Requests;

class AuthController extends Controller
{

      public function validatecustomerlogin(Request $request){
          $this->validate($request, [
              'username'=>'required',
              'password'=>'required',
          ]);
		  
		  $restaurants = Restaurant::all();
			
			
          return view('customercontent.customer-overview',compact('restaurants'));
              
  }
  
   public function showforgotpassword(){
          return view('login.forgottenpassword');
  }

}
