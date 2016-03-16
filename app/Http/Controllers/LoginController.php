<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showcustomerlogin(){
          return view('customercontent.customer-login');
  }
  
   public function showrestaurantlogin(){
          return view('restaurantcontent.restaurant-login');
  }
  
}
