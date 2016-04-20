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

    public function user()
     {
         return $this->belongsTo(User::class, 'id');
     }


    public function menu(){
		return $this->hasMany(Item::class, 'rest_id');
	}

	public function categories(){
		return $this->hasMany(Category::class, 'rest_id');
	}

	public function specials(){
		return $this->hasMany(Special::class, 'rest_id');
	}

	public function aveRating(){
		$aveRating = DB::table("restaurant_average_ratings")->where("restaurant_id", $this->id)->first();
		if($aveRating == null){
			return 0;
		} else {
			$rating = floor($aveRating->AVG_RATING * 2) / 2; //round to nearest half integer
			return $rating;
		}
	}

	public function reviews(){
		return $this->hasMany(Review::class, "restaurant_id")->where("is_displaying", 1);
	}

	public function hours(){
		return $this->hasMany(Hours::class, "rest_ID");
	}

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
