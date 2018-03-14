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
        return [
            'title' => 'required|string|min:2',
            'body' => 'required|string|min:2',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
