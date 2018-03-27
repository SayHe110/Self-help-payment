<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function creating(Order $order)
    {
        if(! $order->order_num){
            $order->order_num = date('YmdHis').rand(100, 999);
        }
    }
}