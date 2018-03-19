<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthorizationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AuthorizationsController extends Controller
{
    public function store(AuthorizationRequest $request)
    {
        // 若有验证码则进入验证码验证
        if($request->captcha_key){
            $this->verifyCaptcha($request);
        }

        $user_name = $request->username;

        // filter_var — 使用特定的过滤器过滤一个变量
        filter_var($user_name, FILTER_VALIDATE_EMAIL)?
            $credentials['email'] = $user_name :
            $credentials['student_id'] = $user_name;

        $credentials['password'] = $request->password;

        if(!$token = Auth::guard('api')->attempt($credentials)){
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    // 验证码进行验证
    protected function verifyCaptcha($data)
    {
        $captchaData = \Cache::get($data->captcha_key);

        if(!$captchaData){
            return $this->response->error('验证码已失效',422);
        }
        if(! hash_equals($captchaData['captcha'], $data->captcha_code)){
            // 清除验证码缓存
            \Cache::forget($data->captcha_key);
            return $this->response->errorUnauthorized('验证码错误');
        }
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
