<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PaymentPasswordRequest;
use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create([
            'student_id' => $request->student_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nickname' => $request->student_id,
            'avatar' => 'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
        ]);

        return $this->response->item($user, new UserTransformer())
            ->setMeta([
                'access_token' => \Auth::guard('api')->fromUser($user),
                'token_type' => 'Bearer',
                'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
            ])
            ->setStatusCode(201);
    }

    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

    public function paymentPassword(PaymentPasswordRequest $request)
    {

        if(\Auth::user()->payment_password == md5($request->payment_password)){
            return $this->response->noContent();
        }else{
            $data = [
                'message' => '支付密码错误',
                'status_code' => '403',
            ];

            return $this->response->array($data)->setStatusCode(403);
        }
    }
}
