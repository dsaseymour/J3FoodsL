<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';//this is the name of the table that this model is linked to if the table name is different change the value

    protected $fillable = [
        'item_id','restaurant_id', 'customer_id', 'quantity',
    ];

    public $timestamps = false;

}
