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
            'dorm_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'description' => '描述',
            'dorm_id' => '宿舍号ID',
        ];
    }
}
