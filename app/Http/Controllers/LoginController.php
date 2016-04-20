<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{

	/*
	*	Displays the login page to the user
	*/
	public function showcustomerlogin(){
		if(\Auth::check()) {
			$isRestaurant = \Auth::user()->isRestaurant;

			if ($isRestaurant == 0){
				return redirect()->action('CustomerController@showcustomeroverview');
			}else{
				return redirect()->action('RestaurantController@showrestaurantoverview');
			}
		}
		$guestemail = 'temp' . rand() . '@temp.com';
		return view('auth.login',compact('guestemail'));
	}
}
