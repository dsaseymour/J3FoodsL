<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
	protected $table = 'category';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $fillable = ['category_order'];

	/**
		Restaurant that this category belongs to
	*/
	public function restaurant(){
		return $this->belongsTo(Restaurant::class);
	}

	/**
		Items in this category
	*/
	public function items(){
		return $this->hasMany(Item::class);
	}
}
