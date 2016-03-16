<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';//this is the name of the table that this model is linked to if the table name is different change the value


    public function customer()
     {
         return $this->belongsToMany('Customer');
     }


}
