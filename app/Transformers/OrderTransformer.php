<?php

namespace App\Transformers;


use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'user_id' => $order->user_id,
            'order_num' => $order->order_num,
            'dormitory_id' => $order->dormitory_id,
            'money' => $order->money,
            'processing_person_id' => $order->processing_person_id,
            'is_handle' => is_bool($order->is_handle),
            'created_at' => $order->created_at->toDateTimeString(),
            'updated_at' => $order->updated_at->toDateTimeString(),
        ];
    }
}