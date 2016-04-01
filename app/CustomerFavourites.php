<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerFavourites extends Model
{
    protected $table = 'customer_favourites'; //this is the name of the table that this model is linked to if the table name is different change the value
	protected $primaryKey = 'customer_ID';
	protected $fillable = ['customer_ID','restaurant_ID'];
	public $timestamps = false;

    //
}
