<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class AuthorizationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            'username' => '学号/邮箱',
            'password' => '密码',
        ];
    }
}
