<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\OrderRequest;
use App\Models\Order;
use App\Transformers\OrderTransformer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderRequest $request, Order $order)
    {
        $order->dormitory_id = $request->dorm_id;
        $order->money = $request->money;
        $order->user_id = $this->user()->id;
        $order->order_num = date('YmdHis').rand(100, 999);
        
        $order->save();
        
        return $this->response->item($order, new OrderTransformer())->setStatusCode(201);
    }

    public function me()
    {
        $orders = Order::where('user_id', $this->user()->id)->get();
        
        return $this->response->collection($orders, new OrderTransformer());
    }
}
