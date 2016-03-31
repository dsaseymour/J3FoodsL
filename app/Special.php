<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
	protected $table = 'specials';

    public function restaurant(){
		return $this->belongsTo(Restaurant::class);
	}

	public function item(){
		return $this->hasOne(Item::class, 'spec_id');
	}
}
