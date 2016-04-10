<?php

namespace App\Listeners;

use App\Events\OrderWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;
use App\Restaurant;
use App\Orders;
use App\Item;
use App\Customer;
use App\Option;
use App\OptionChoice;
use DB;



class OrderConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasSubmitted  $event
     * @return void
     */
    public function handle(OrderWasSubmitted $event)
    {
        $orderparam=$event->order->first();
        $orderset=$event->order;
        $customer = User::find($orderparam->customer_id);
        $restaurant=Restaurant::find($orderparam->restaurant_id);

        Mail::send('email.orderconfirmation',['order'=>$orderset,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($orderparam){
        $customer = User::find($orderparam->customer_id);
        $email=$customer->email;
        $message->to($email)->subject('Your Order has been processed');
        });

        Mail::send('email.ratingrequest',['order'=>$orderparam,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($orderparam){
        $customer = User::find($orderparam->customer_id);
        $email=$customer->email;
        $name=$customer->name;
		$message->to($email)->subject($name."".' Will You Rate Your Experience At J3Foods?');
		});

        Mail::send('email.ordernotification',['order'=>$orderset,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($orderparam){
        $customer = User::find($orderparam->restaurant_id);
        $email=$customer->email;
        $orderno=$orderparam->order_id;
        $message->to($email)->subject('New Order#'.$orderno." ".'Has Been Submitted');
        });

    }


}
