<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    //
	public function login($user){

		return view('login.login', ["usertype" => $user] );
		
	}
}
