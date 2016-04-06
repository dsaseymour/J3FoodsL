<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';//this is the name of the table that this model is linked to if the table name is different change the value

    protected $primaryKey = 'order_id';
	protected $fillable = ['submit_time','completed','quantity','special_instructions'];
	public $timestamps = false;

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'customer_id');
    }

    public function item(){
    	return $this->belongsTo(Item::Class, 'item_id');
    }
}
