<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;
use App\CustomerFavourites;
use App\CustomerRatings;
use App\Hours;
use App\Items;
use App\Menu;
use App\Orders;
use App\Restaurant;
use App\User;



class MasterController extends Controller
{

  public function passwordreset(){
          return view('login.forgottenpassword');
  }


  public function showhome(){
    $guestemail = 'temp' . rand() . '@temp.com';
    return view('home',compact('guestemail'));
  }

public function showhotoregister(){
  return view('howto-register');
}
  public function postCustomerLogin(Request $request)
  {


  }

  public function error(Request $request){
  	$request->session()->reflash();
  	return view('errors.error');
  }



}
