<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;
use App\CustomerFavourites;
use App\CustomerRatings;
use App\Hours;
use App\Items;
use App\Menu;
use App\Orders;
use App\Restaurant;
use App\User;



class MasterController extends Controller
{


  public function showhome(){
          return view('home');
  }

  public function postCustomerLogin(Request $request)
  {


  }





}
