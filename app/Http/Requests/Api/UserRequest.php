<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;
use App\Rules\FieldHasExisted;

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
            'student_id' => 'required|integer|unique:users,student_id',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'student_id.unique' => '学号已注册',
            'student_id.integer' => '学号应为整型',
            'email.email' => '请输入正确的邮箱地址',
        ];
    }

    public function attributes()
    {
        return [
            'student_id' => '学号',
            'email' => '邮箱地址',
            'password' => '密码',
//            'captcha_key' => '验证码 key',
//            'captcha_code' => '验证码',
        ];
    }
}
