<?php

namespace App\Events;

use App\Orders;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * This Event is linked to the
 * OrderCancellationNotification listener
 * which emails a customer if their order has been canceled
 * i.e. if this event is fired  
 */
class OrderWasCanceled extends Event
{
    use SerializesModels;

    public $order;//collection of order objects
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order=$order;

        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
