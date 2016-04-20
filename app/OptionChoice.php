<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionChoice extends Model
{
	protected $table = 'option_choices';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $primaryKey = 'option_id';

	public function item(){
		return $this->belongsTo(Item::class);
	}
}
