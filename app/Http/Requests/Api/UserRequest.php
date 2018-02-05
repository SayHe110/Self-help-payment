<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class UserRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'student_id' => 'required|integer|between:100000,100999',
            'student_id' => 'required|integer',
            'password' => 'required|min:5',
            'dormitory_id' => 'required|integer',
            'captcha_key' => 'required|string',
            'captcha_code' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'student_id' => '学号',
            'password' => '密码',
            'dormitory_id' => '宿舍ID',
            'captcha_key' => '验证码 key',
            'captcha_code' => '验证码',
        ];
    }
}
