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
        $orderparam=$event->order;
        $user = User::find($orderparam->customer_id);
        $restaurant=Restaurant::find($orderparam->restaurant_id);
//        $items= Items::find();
        $fullorderdescription=$this->createOrderSummary($orderparam);

        Mail::send('email.orderconfirmation',['order'=>$orderparam,'user'=>$user,'restaurant'=>$restaurant,'fullorderdescription'=>$fullorderdescription], function($message) use ($event){
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

        $customer=User::find($orderparam->customer_id);
        Mail::send('email.ordernotification',['order'=>$orderparam,'user'=>$user,'restaurant'=>$restaurant,'customer'=>$customer,'fullorderdescription'=>$fullorderdescription], function($message) use ($event){
        $order=$event->order;
        $user = User::find($order->restaurant_id);
        $email=$user->email;
        $orderno=$order->order_id;
        $message->to($email)->subject('New Order#'.$orderno." ".'Has Been Submitted');
        });

    }

    public function createOrderSummary(Order $order)
        {
            $orderset=DB::table('orders')
                        ->where('order_id', '=', $order->order_id)
            			->where('restaurant_id', '=', $order->restaurant_id)
            			->where('customer_id', '=', $order->customer_id)
            			->get();

                        $itemname_set;
                        $optionname_set;
                        $choicename_set;
                        $specialinstruction_set;
                        $itemprice_set;
                        $orderquantity_set;
                        $i=0;

                        foreach ($orderset as $order){
                        		 $itemname_set[$i]=$order->item_id;
                        		 $optionname_set[$i]=$order->option_id;
                        		 $choicename_set[$i]=$order->choice_id;
                        		 $specialinstruction_set[$i]=$order->special_instructions;
                                 $orderquantity_set[$i]=$order->quantity;
                        		 $i++;
                        }
                        array_reverse($orderquantity_set);
                        for($j = $i-1; $j >= 0; $j--){
                        $itemsobject=DB::table('items')->where('item_id',$itemname_set[$j])->first();
                        if($itemsobject){
                        $itemname_set[$j]=$itemsobject->name;
                        $itemprice_set[$j]=$itemsobject->price;
                        }else{
                            $itemname_set[$j]=NULL;
                            $itemprice_set[$j]=NULL;
                        }

                        $optionsobject=DB::table('options')->where('id',$optionname_set[$j])->first();
                        if($optionsobject){$optionname_set[$j]=$optionsobject->name;}else{$optionname_set[$j]=NULL;}

                        $choiceobject=DB::table('option_choices')->where('choice_id',$choicename_set[$j])->first();
                        if($choiceobject){$choicename_set[$j]=$choiceobject->name;}else{$choicename_set[$j]=NULL;}
                        }
                        return(['itemname_set'=>$itemname_set,'optionname_set'=>$optionname_set,'choicename_set'=>$choicename_set,'specialinstruction_set'=>$specialinstruction_set,'orderquantity_set'=>$orderquantity_set,'itemprice_set'=>$itemprice_set]);
        }

}
