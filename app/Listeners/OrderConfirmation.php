<?php

namespace App\Listeners;

use App\Events\OrderWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;
use App\Restaurant;

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
        $orderparam=$event->order;
        $user = User::find($orderparam->customer_id);
        $restaurant=Restaurant::find($orderparam->restaurant_id);
//        $items= Items::find();

        Mail::send('email.orderconfirmation',['order'=>$orderparam,'user'=>$user,'restaurant'=>$restaurant], function($message) use ($event){
        $order=$event->order;
        $user = User::find($order->customer_id);
        $email=$user->email;
        $message->to($email)->subject('Your Order has been processed');
        });

        Mail::send('email.ratingrequest',['order'=>$orderparam,'user'=>$user, 'restaurant'=>$restaurant], function($message) use ($event){
            $order=$event->order;
            $user = User::find($order->customer_id);
            $email=$user->email;
            $name=$user->name;
		$message->to($email)->subject($name."".' Will You Rate Your Experience At J3Foods?');
		});


    }
}
