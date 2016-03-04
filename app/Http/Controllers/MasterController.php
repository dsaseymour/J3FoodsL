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

  public function login($user="customer"){

          return view('login',['usertype'=>$user]);
  }

  public function register($user="customer"){

          return view('register',['usertype'=>$user]);
  }





}
