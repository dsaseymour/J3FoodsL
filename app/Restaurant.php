<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function customer()
     {
         return $this->belongsToMany('Customer');
     }


}
