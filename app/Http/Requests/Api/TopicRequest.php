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
        // todo
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ];
    }
}
