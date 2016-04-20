<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    protected $table = 'hours';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $fillable = ['rest_ID','day_ID','open','open_time','close_time'];

    public function restaurant() {
    	return $this->belongsTo('Restaurant', "rest_ID");
    }
    
}
