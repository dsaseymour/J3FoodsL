<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Requests;
use App\Customer;
use DB;


class CustomerController extends Controller
{
	
     public function validatecustomerlogin(Request $request){
      /*
          $this->validate($request, [
              'username'=>'required',
              'password'=>'required',
          ]);
      */
          //$restaurants = Restaurant::all();
            
               return redirect()->action('CustomerController@showcustomeroverview');
          //return view('customercontent.customer-overview',compact('restaurants'));
              
    }
		public function showrestaurant(){
			
			
			
			
		}

        public function __construct()
        {
//            $this->middleware('auth');  

        }


        public function dummycreate(Request $request){
             $customer = new Customer;
             $user->username     = Input::get('username');
             $user->password     = Hash::make(Input::get('password'));
             $user->email        = Input::get('email');
             $user->save();

             return Response::make('User created! Hurray!');
        }
		
		public function showcustomeroverview(){
			
			$restaurants = Restaurant::all();
			
			
          return view('customercontent.customer-overview',compact('restaurants'));
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
		
		

        public function dummygetcustomer(){
             $customers=Customer::orderBy('created_at', 'asc')->get();

             return viewcustomers('',[
                        'viewcustomers' => $viewcustomers
                ]);
        }



}
