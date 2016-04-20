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

    //Moved to customer
    public function favourites(){
        return $this->hasMany('App\CustomerFavourites', 'customer_id');
    }

    /**
        Customer for this user, if user is customer
    */
    public function customer(){
        if($this->isRestaurant){
            return null;
        } else {
            return $this->hasOne('App\Customer', 'id');
        }
    }

    /**
        Restaurant for this user, user is restaurant
    */
    public function restaurant(){
        if(!$this->isRestaurant){
            return null;
        } else {
            return $this->hasOne(Restaurant::class, "id");
        }
    }
}
