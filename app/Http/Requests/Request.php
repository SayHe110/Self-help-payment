<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use Dingo\Api\Http\FormRequest;

class Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}
