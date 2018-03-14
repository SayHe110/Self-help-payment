<?php

namespace App\Http\Controllers\Api;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class CaptchasController extends Controller
{
    public function store(CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);

        $captcha = $captchaBuilder->setMaxFrontLines(1)
                                  ->setBackgroundColor(230,230,250)
                                  // ->buildAgainstOCR('','',public_path().'/captcha_fonts/captcha0.ttf');
                                  ->build(130,35,public_path().'/captcha_fonts/captcha0.ttf');

        // 两分钟后过期
        $expiredAt = now()->addMinutes(20);
        \Cache::put($key, ['captcha'=>$captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt,
            'captcha_image_content' =>$captcha->inline(),
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
