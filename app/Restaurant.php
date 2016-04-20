<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Datetime;

class Restaurant extends Model
{
	
    protected $table = 'restaurant';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['id','companyname','address','province','city','postalcode','phoneno','max_order_price','allow_guests'];

	/**
		User associated with this restaurant
	*/
    public function user()
     {
         return $this->belongsTo(User::class, 'id');
     }

    /**
    	List of items in this restaurant's menu
    */
    public function menu(){
		return $this->hasMany(Item::class, 'rest_id');
	}

	/**
		Categories for this restaurant's menu
	*/
	public function categories(){
		return $this->hasMany(Category::class, 'rest_id');
	}

	/**
		Items currently on special for this restaurant
	*/
	public function specials(){
		return $this->hasMany(Special::class, 'rest_id');
	}

	/**
		Average customer rating for this restaurant
	*/
	public function aveRating(){
		$aveRating = DB::table("restaurant_average_ratings")->where("restaurant_id", $this->id)->first();
		if($aveRating == null){
			return 0;
		} else {
			$rating = floor($aveRating->AVG_RATING * 2) / 2; //round to nearest half integer
			return $rating;
		}
	}

	/**
		List of reviews that are approved for display for this restaurant
	*/
	public function reviews(){
		return $this->hasMany(Review::class, "restaurant_id")->where("is_displaying", 1);
	}

	/**
		Set of operating hours for this restaurant
	*/
	public function hours(){
		return $this->hasMany(Hours::class, "rest_ID");
	}

	/**
		Restaurant's hours for the current day
	*/
	public function todayHours(){
		$todayHours = DB::select("select * from hours where day_ID = WEEKDAY(NOW())+1 AND rest_ID = '".$this->id."'");
		if(sizeOf($todayHours) > 0){
			if(!$todayHours[0]->open){
				return "Closed";
			}
			$openTime = (new Datetime($todayHours[0]->open_time))->getTimestamp();
			$closeTime = (new DateTime($todayHours[0]->close_time))->getTimestamp();
			$openTimeS = date("G:i", $openTime);
			$closeTimeS = date("G:i", $closeTime);
			return $openTimeS."-".$closeTimeS;
		} else {
			return "Unknown";
		}
	}

	/**
		Restaurant's hours for the next day
	*/
	public function tomorrowHours(){
		$tomorrowHours = DB::select("select * from hours where day_ID = WEEKDAY(NOW())+2 AND rest_ID = '".$this->id."'");
		if(sizeOf($tomorrowHours) > 0){
			if(!$tomorrowHours[0]->open){
				return "Closed";
			}
			$openTime = (new Datetime($tomorrowHours[0]->open_time))->getTimestamp();
			$closeTime = (new DateTime($tomorrowHours[0]->close_time))->getTimestamp();
			$openTimeS = date("G:i", $openTime);
			$closeTimeS = date("G:i", $closeTime);
			return $openTimeS."-".$closeTimeS;
		} else {
			return "Unknown";
		}
	}
}
