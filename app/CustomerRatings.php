<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRatings extends Model
{
    protected $table = 'customer_ratings';//this is the name of the table that this model is linked to if the table name is different change the value
    public $timestamps = false;


    protected $fillable = [
        'restaurant_id','customer_id', 'rating', 'comment',
    ];


    //
}
