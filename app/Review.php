<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $table = 'customer_ratings';//this is the name of the table that this model is linked to if the table name is different change the value
	protected $primaryKey = 'id';

	public function restaurant(){
		return $this->belongsTo(Restaurant::class, "restaurant_id");
	}

	public function poster(){
		return $this->belongsTo(Customer::class, "customer_id");
	}

}
