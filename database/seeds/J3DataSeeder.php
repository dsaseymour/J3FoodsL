<?php

use Illuminate\Database\Seeder;

use App\Customer;
use App\CustomerFavourites;
use App\CustomerRatings;
use App\Hours;
use App\Items;
use App\Menu;
use App\Orders;
use App\Restaurant;
use App\User;


class J3DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=new Customer();
        $cfav=new CustomerFavourites();
        $crate=new CustomerRatings();
        $hours=new Hours();
        $items=new Items();
        $menu=new Menu();
        $orders=new Orders();
        $restaurant=new Restaurant();
        $user=new User();




    }
}
