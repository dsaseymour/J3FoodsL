<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    public function restaurant()
         {
     return $this->belongsTo('Restaurant');
         }


 
}
