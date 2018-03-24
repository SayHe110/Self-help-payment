<?php

namespace App\Http\Controllers\Api;


use App\Models\Dormitory;

class ElectricityFeesController extends Controller
{
    public function show()
    {
        $user = \Auth::user();
        $dormitory = Dormitory::find($user->dormitory_id);

        $data = [
            'user' => $user,
            'dormitory_name' => $dormitory->dorm,
            'electricityFees' => $dormitory->electricityFees,
        ];

        return $this->response->array($data)->setStatusCode(201);
    }
}
