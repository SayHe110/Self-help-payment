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
            'student_id' => 'required|integer',
            'password' => 'required|string',
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
