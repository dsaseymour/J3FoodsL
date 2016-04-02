<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';//this is the name of the table that this model is linked to if the table name is different change the value
	protected $primaryKey = 'item_id';

	public function restaurant(){
		return $this->belongsTo(Restaurant::class);
	}

	public function category(){
		return $this->belongsTo(Category::class);
	}

	public function special(){
		return $this->belongsTo(Special::class, 'spec_id');
	}

	public function option(){
		return $this->hasOne(Option::class);
	}
}
