<?php

namespace App\Listeners;

use App\Events\OrderWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
