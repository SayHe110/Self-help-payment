<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorizationRequest;
use Illuminate\Http\Request;
use Auth;

class AuthorizationsController extends Controller
{
    public function store(AuthorizationRequest $request)
    {
        $username = $request->username;

        // 因为手机为 13 位 所以来判断用户是手机登录还是学号登录
        strlen($username)!=13 ? $credentials['student_id']=$username : $credentials['phone'] = $username;

        $credentials['password'] = $request->password;

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ])->setStatusCode(201);
    }

    public function update()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
