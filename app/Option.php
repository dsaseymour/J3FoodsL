<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	protected $table = 'options';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $primaryKey = 'id';

	/**
		Item this option belongs to
	*/
	public function item(){
		return $this->belongsTo(Item::class);
	}

	/**
		Choices for this option
	*/
	public function choices(){
		return $this->hasMany(OptionChoice::class);
	}

}
