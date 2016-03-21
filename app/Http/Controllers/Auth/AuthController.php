<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/customeroverview';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    /*public function validatecustomerlogin(Request $request){
          $this->validate($request, [
              'username'=>'required',
              'password'=>'required',
          ]);
          
          //$restaurants = Restaurant::all();
            
               return redirect()->action('CustomerController@showcustomeroverview');
          //return view('customercontent.customer-overview',compact('restaurants'));
              
  }
  
   public function showforgotpassword(){
          return view('login.forgottenpassword');
  }
  */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
	
	
	public function register(Request $request)
    {
       
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));
		if($request->isRestaurant == "1"){
            return redirect()->action('RegisterController@showrestaurantregisterinfo');	
		}else{
			return redirect($this->redirectPath());
		}
    }
	
	protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
		
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

		$results = DB::select("SELECT  `isRestaurant` FROM  `users` WHERE email =  ?",[$request->email]);
	
		
			$newresults=  $results[0]->isRestaurant;
		
		
		
		if($newresults== '1'){
			return redirect()->action('RestaurantController@showrestaurantoverview');
		}else{
			return redirect()->intended($this->redirectPath());
		}
    }
	
	protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }
	
	

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
			'isRestaurant' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
			'testing' => 'required|min:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
			'isRestaurant' => $data['isRestaurant'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
