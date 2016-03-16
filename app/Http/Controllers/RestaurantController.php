<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RestaurantController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('auth');

    }

    public function restaurantlogin(Request $request){

        return view('restaurantcontent.restaurant-login');
    }

     public function showrestauranthistory(){
          return view('restaurantcontent.restaurant-history');
  }

  public function showrestaurantmadmin(){
          return view('restaurantcontent.restaurant-menuadmin');
  }

  public function showrestaurantmedit(){
          return view('restaurantcontent.restaurant-menuedit');
  }

  public function showrestaurantmoverview(){
          return view('restaurantcontent.restaurant-menuoverview');
  }

  public function showrestaurantoverview(){
          return view('restaurantcontent.restaurant-overview');
  }

  public function showrestaurantprofile(){
          return view('restaurantcontent.restaurant-profile');
  }

  public function showrestaurantrestrictions(){
          return view('restaurantcontent.restaurant-profile-restrictions');
  }

  public function showrestaurantprofilehours(){
          return view('restaurantcontent.restaurant-profile-hours');
  }
}
