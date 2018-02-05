<?php

namespace App\Http\Controllers\Api;

use App\Models\Dormitory;
use App\Transformers\DormitoryTransformer;
use Illuminate\Http\Request;

class DormitoriesController extends Controller
{
    public function show()
    {
        $dormitories = Dormitory::all();
        return $this->response->item($dormitories , new DormitoryTransformer());
    }
}
