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
        // 验证码验证
        $this->captchaVerify($request->captcha_key, $request->captcha_code);

        $student_id = $request->student_id;

        // 如果为第一次登录则保存至数据库
        $user = is_first_login($student_id);
        if(empty($user)){
            $this->first_login_store($request);
        }

        $credentials['student_id'] = $request->student_id;

        $credentials['password'] = $request->password;

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    public function first_login_store($request)
    {
        // 验证码验证
        $this->captchaVerify($request->captcha_key, $request->captcha_code);

        // 用户创建
        User::create([
            'student_id' => $request->student_id,
            'password' => bcrypt($request->password),
            'nickname' => str_random(10),
        ]);

        $credentials['student_id'] = $request->student_id;

        $credentials['password'] = $request->password;

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    //todo 登录封装，使用没有返回值
    public function login_verify($request)
    {
        $credentials['student_id'] = $request->student_id;

        $credentials['password'] = $request->password;

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }
        // 完成后清除验证码缓存
        // \Cache::forget($request->captcha_key);

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    public function captchaVerify($captcha_key, $captcha_code)
    {
        $captchaData = \Cache::get($captcha_key);

        if(!$captchaData){
            return $this->response->error('验证码已失效',422);
        }
        if(! hash_equals($captchaData['captcha'], $captcha_code)){
            // 清除验证码缓存
            \Cache::forget($captcha_key);
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
