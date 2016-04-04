<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';//this is the name of the table that this model is linked to if the table name is different change the value

	protected $fillable = ['order_id','item_id','restaurant_id','customer_id','time_out','completed','quantity','special_instructions'];
	public $timestamps = false;

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function customer(){
    	return $this->belongsTo(Customer::class);
    }

    public function item(){
    	return $this->belongsTo(Item::Class, 'item_id');
    }
}
