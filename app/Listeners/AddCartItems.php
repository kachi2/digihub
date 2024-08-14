<?php

namespace App\Listeners;

use App\Events\CartItemsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\CartItem;
use Illuminate\Queue\InteractsWithQueue;

class AddCartItems implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CartItemsEvent  $event
     * @return void
     */
    public function handle(CartItemsEvent $events)
    {    
            foreach($events->carts as $cart){
            $data = [
                'user_id' => auth_user()->id,
                'product_id' => $cart->model->id,
                'Order_no' => $events->orderNo,
                'qty' => $cart->qty,
                'payable' => $cart->price * $cart->qty,
                'status' => 0,
                'cartSession' => $events->cartSession,
                'image' => $cart->model->image_path,
                'product_name' => $cart->model->name,
                'price' => $cart->model->sale_price,
            ];
            CartItem::create($data);
          }
    }
}
