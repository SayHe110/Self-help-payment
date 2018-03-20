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

    public function attributes()
    {
        return [
            'student_id' => '学号',
            'password' => '密码',
        ];
    }
}
