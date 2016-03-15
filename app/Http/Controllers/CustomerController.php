<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;



class CustomerController extends Controller
{

        public function dummycreate(){
             $customer = new Customer;
             $user->username     = Input::get('username');
             $user->password     = Hash::make(Input::get('password'));
             $user->email        = Input::get('email');
             $user->save();

             return Response::make('User created! Hurray!');
        }
		
		public function showcustomeroverview(){
          return view('customercontent.customer-overview');
  }

  public function showcustomermenuoverview(){
          return view('customercontent.customer-menuoverview');
  }

  public function showcustomerconfirmation(){
          return view('customercontent.confirmationpage');
  }

  public function showcpeditaddress(){
          return view('customercontent.customer-profile-editaddress');
  }

  public function showcpeditorders(){
          return view('customercontent.customer-profile-editorders');
  }

  public function showcustomerprofile(){
          return view('customercontent.customer-profile');
  }
		
		




}
