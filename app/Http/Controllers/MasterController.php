<?php
/*
  This controller handles the error page aswell as guest access to the website
*/


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

  /*
  * handle guest logins
  */
  public function showhome(){
    $guestemail = 'temp' . rand() . '@temp.com';
    return view('home',compact('guestemail'));
  }

  /**
  * Shows the how to page to the user
  */
  public function showhotoregister(){
    return view('howto-register');
  }

  /*
  * Redirects to the error page with the given message
  * @param $request The information of the error
  */
  public function error(Request $request){
  	$request->session()->reflash();
  	return view('errors.error');
  }



}
