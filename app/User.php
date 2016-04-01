<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','isRestaurant', 'email', 'password','confirmation_code',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	
	/*public function menu(){
		return $this->hasMany(Item::class, 'rest_id');
	}*/

    public function favourites(){
        return $this->hasMany('App\CustomerFavourites', 'customer_id');
    }
}
