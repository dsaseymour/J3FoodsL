<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

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
  $user = User::whereConfirmationCode($confirmation_code)->first();
  if(!$confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }
  if($user->isEmpty()){
    throw new UserNotFoundException;
  }
  $user->confirmed = 1;
  $user->confirmation_code = null;
  $user->save();
  Flash::message('You have successfully verified your account.');
  if($user->isRestaurant==1){return Redirect::route('loginrest');}
  return Redirect::route('logincust');
}



}
