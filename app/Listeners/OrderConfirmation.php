<?php

namespace App\Listeners;

use App\Events\OrderWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;

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
        $data=compact("event");
        Mail::send('email.orderconfirmation',$data, function($message) use ($event){
        $order=$event->order;
        $user = User::find($order->customer_id);
        $email=$user->email;
        $message->to($email)->subject('Your Order has been processed');
        });

        Mail::later(7200,'email.ratingrequest',$data, function($message) use ($event){
            $order=$event->order;
            $user = User::find($order->customer_id);
            $email=$user->email;
		$message->to($email)->subject('Will You Rate Your Experience At J3Foods?');
		});

    }
}
