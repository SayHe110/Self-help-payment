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
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }
}
