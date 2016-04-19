<?php

namespace App\Listeners;

use App\Events\OrderWasCanceled;
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


class OrderCancellationNotification
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
     * @param  OrderWasCanceled  $event
     * @return void
     */
    public function handle(OrderWasCanceled $event)
    {
        $orderparam=$event->order->first();
        $orderset=$event->order;
        $customer = User::find($orderparam->customer_id);
        $restaurant=Restaurant::find($orderparam->restaurant_id);
        Mail::send('email.ordercancellation',['order'=>$orderset,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($customer){
        $message->to($customer->email)->subject('Your Order has been canceled');
        });
    }
}
