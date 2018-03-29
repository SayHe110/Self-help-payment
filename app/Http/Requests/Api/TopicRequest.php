<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class TopicRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|string|min:2',
                    'body' => 'required|string|min:2',
                    'category_id' => 'required|numeric',
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'string',
                    'body' => 'string',
                    'category_id' => 'exists:categories,id',
                ];
                break;
        }

    }

    public function messages()
    {
        return [
            //
        ];
    }
}
