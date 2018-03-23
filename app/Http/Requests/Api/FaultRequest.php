<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class FaultRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'dormitory' => 'required|integer',
            'phone' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'description' => '描述',
            'dormitory_id' => '宿舍号',
            'phone' => '手机号码',
        ];
    }
}
