<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class PasswordRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|max:12|string',
        ];
    }

    public function attributes()
    {
        return [
            'password' => '密码',
        ];
    }
}
