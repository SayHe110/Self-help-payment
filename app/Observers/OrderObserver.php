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

    public function created(Order $order)
    {
        // 通知用户购电信息
        $order->user->notify(new \App\Notifications\Order($order));
    }
}