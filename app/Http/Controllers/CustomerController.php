<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;



class CustomerController extends Controller
{

        public function __construct()
        {
            $this->middleware('auth');

        }


        public function dummycreate(Request $request){
             $customer = new Customer;
             $user->username     = Input::get('username');
             $user->password     = Hash::make(Input::get('password'));
             $user->email        = Input::get('email');
             $user->save();

             return Response::make('User created! Hurray!');
        }

        public function dummygetcustomer(){
             $customers=Customer::orderBy('created_at', 'asc')->get();

             return viewcustomers('',[
                        'viewcustomers' => $viewcustomers
                ]);
        }



}
