<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Requests;
use App\Customer;
use DB;


class CustomerController extends Controller
{
	
	
        public function __construct()
        {
            $this->middleware('auth');  

        }
		
	
     public function validatecustomerlogin(Request $request){//Why does this redirect to the method directly below? I remeber it had somethign to do with the url 
        return redirect()->action('CustomerController@showcustomeroverview');
    }
	
	public function showcustomeroverview(){
			
		//$restaurants = Restaurant::all();
    $restaurants = Restaurant::where('isRestaurant',1)->get();
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
		
		
		
		
		/*
		
		Danny working on test database 
		
		*/
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
