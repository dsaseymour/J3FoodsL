<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
	protected $table = 'specials';
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['rest_id','item_id','spec_price'];

	/**
		Restaurant this special is for
	*/
    public function restaurant(){
		return $this->belongsTo(Restaurant::class);
	}

	/**
		Item associated with this special
	*/
	public function item(){
		return $this->hasOne(Item::class, 'spec_id');
	}
}
