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
            $data = [
                'message' => '用户名或者密码错误',
                'whetherNeedCaptcha' => $this->whetherNeedCaptcha($request->username),
                'status_code' => 401,
            ];
            return $this->response->array($data)->setStatusCode(401);
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    // 使用 username 字段进行存储
    protected function whetherNeedCaptcha($username)
    {
        $expiredAt = now()->addMinutes(2);
        if(! \Cache::has($username)){

            \Cache::put($username, 0, $expiredAt);
        }
        $value = \Cache::get($username);
        $value = $value+1;
        \Cache::put($username, $value, $expiredAt);

        if(\Cache::get($username) > 3){
            return true;
        }
        return false;
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
