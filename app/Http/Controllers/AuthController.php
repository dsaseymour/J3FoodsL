<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{

      public function validatecustomerlogin(Request $request){
          $this->validate($request, [
              'username'=>'required',
              'password'=>'required',
          ]);
                  return view('customercontent.customer-overview');
  }

}
