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


}
