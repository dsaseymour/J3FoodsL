<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MasterController extends Controller
{

  public function __construct()
   {
//define middleware

   }


  public function showhome(){
          return view('home');
  }

  public function login($user){

          return view('login.login',['usertype'=>$user]);
  }

  public function register($user){

          return view('register',['usertype'=>$user]);
  }
  
  public function riley(){
	  return view('restaurantcontent.restaurant-login');
  }





}
