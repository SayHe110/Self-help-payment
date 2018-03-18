<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class ReportRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|between:3,50',
            'reports' => 'required|between:3,50',
            'description' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'reports' => '投诉人/单位',
            'description' => '描述',
        ];
    }
}
