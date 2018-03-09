<?php

namespace App\Http\Controllers\Api;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class CaptchasController extends Controller
{
    public function store(CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);

        $captcha = $captchaBuilder->build()->setBackgroundColor(230,230,250);

        // 两分钟后过期
        $expiredAt = now()->addMinutes(20);//todo 测试更改
        \Cache::put($key, ['captcha'=>$captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt,
            'captcha_image_content' =>$captcha->inline(),
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
