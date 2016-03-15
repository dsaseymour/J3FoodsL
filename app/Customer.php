<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    //a customer has many restaurant favorites
    public function favorites(){
        return $this->hasMany('Restaurant');
    }

    public function restaurant()
     {
         return $this->belongsToMany('Restaurant');
     }



    public function dummycreate(){
         $customer = new Customer;
         $user->username     = Input::get('username');
         $user->password     = Hash::make(Input::get('password'));
         $user->email        = Input::get('email');
         $user->save();

         return Response::make('User created! Hurray!');
    }

    


}
