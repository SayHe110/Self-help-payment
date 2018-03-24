<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class OrderRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dorm_id' => 'required',
            'money' => 'required',
            'payment_password' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'payment_password.required' => '请输入支付密码',
            'payment_password.integer' => '支付密码应为整型',
        ];
    }
}
