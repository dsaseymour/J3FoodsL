<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Requests;
use App\Customer;
use DB;
use Validator;

class CustomerController extends Controller
{
	
	
  public function __construct()
  {
    $this->middleware('auth');  
  }
  
  
	/**
		Updates the user info with the data eneterd in the update user info page
	*/	
	public function updateinfo(Request $request){
		
		$validator = $this->validatecustomerupdate($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
		$this->updateDatabaseWithNewInfo($request);
		return redirect()->action('CustomerController@showcustomeroverview');
	}
	
	/**
		Updates the database with the updated info of the customer
		
		**ONLY ADD NEW FEILDS BELOW , NOTHING ABOVE EMAIL/NAME
		
	*/
	protected function updateDatabaseWithNewInfo(Request $request){
		
		if(\Auth::check()) {
            $id = \Auth::user()->id;
        }
		
		$alldata = $request->all();
		$table = 'users';
		$count = 0;
		
		foreach ($alldata as $key => $value){
			if($count == 0){
				$count = $count + 1 ;
			}else{
				if($count == 3){ //need to update customer table with other info
					$table = 'customer';
				}
				if($value != '' || $value != null){
					$query = DB::table($table)
						->where('id', $id)
						->update([$key => $value]);
				}
				$count = $count+1;

			}
		}
	}
	
	protected function validatecustomerupdate(array $data)
    {
		
            return Validator::make($data, [
                'email' => 'email|max:255|unique:users',
				'phoneno' => 'max:13',
            ]);
       
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
