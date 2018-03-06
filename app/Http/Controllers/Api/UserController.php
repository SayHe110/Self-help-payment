<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $captchaData = \Cache::get($request->captcha_key);

        if(!$captchaData){
            return $this->response->error('验证码已失效',422);
        }
        if(! hash_equals($captchaData['captcha'], $request->captcha_code)){
            // 清除验证码缓存
            \Cache::forget($request->captcha_key);
            return $this->response->errorUnauthorized('验证码错误');
        }
        // dd($request->dormitory_id);
        User::create([
            'student_id' => $request->student_id,
            'password' => bcrypt($request->password),
            'nickname' => str_random(10),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->captcha_key);
        return $this->response->created();
    }

    public function me()
    {
        // dd($this->user()->dormitory->dorm_number);
        return $this->response->item($this->user(), new UserTransformer());
    }
}
