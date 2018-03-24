<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Transformers\OrderTransformer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderRequest $request, Order $order)
    {

        if(\Auth::user()->payment_password == md5($request->payment_password)){
            $order->dormitory_id = $request->dorm_id;
            $order->money = $request->money;
            $order->user_id = $this->user()->id;
            $order->order_num = date('YmdHis').rand(100, 999);

            $order->save();

            return $this->response->item($order, new OrderTransformer())->setStatusCode(201);
        }else{
            $data = [
                'message' => '支付密码错误',
                'status_code' => '403',
            ];

            return $this->response->array($data)->setStatusCode(403);
        }
    }

    public function me()
    {
        $orders = Order::where('user_id', $this->user()->id)->orderBy('created_at', 'DESC')->paginate(10);

        return $this->response->paginator($orders, new OrderTransformer());
    }
}
