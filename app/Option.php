<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	protected $table = 'options';//this is the name of the table that this model is linked to if the table name is different change the value

	public function item(){
		return $this->belongsTo(Item::class);
	}

	public function choices(){
		return $this->hasMany(OptionChoice::class);
	}

}
