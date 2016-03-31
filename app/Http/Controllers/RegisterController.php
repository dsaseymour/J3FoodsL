<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class RegisterController extends Controller
{
    public function showcustomerregister(){
          //return view('auth.register',['isRest' => false]);
          return view('auth.register');
  }

   public function showrestaurantregister(){
          //return view('auth.register',['isRest' => true]);
          return view('auth.restaurantRegister');
  }

  public function showrestaurantregisterinfo(){
          return view('restaurantcontent.restaurant-registration');
  }

  //Confirmation page thanks for coming!!
  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

public function confirm($confirmation_code){

  $user = User::where('email','dannyseymour1990@gmail.com')->first();
  var_dump($confirmation_code);
  var_dump($user->confirmation_code);

  var_dump(User::where('confirmation_code',$confirmation_code)->first());



  $user = User::where('confirmation_code',$confirmation_code)->first();
  if(!$confirmation_code)
        {
  //        return Redirect::to('http://www.cnn.com');

          //  throw new InvalidConfirmationCodeException;
        }
  if(!$user){
  //  return Redirect::to('http://www.cnn.com');

      //throw new UserNotFoundException;
  }
  $user->confirmed = 1;
  $user->confirmation_code = null;
  $user->save();
  if($user->isRestaurant==1){return Redirect::route('loginrest');}
  return Redirect::route('logincust');
}



}
