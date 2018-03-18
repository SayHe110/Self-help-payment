<?php

namespace App\Http\Controllers\Api;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoriesController extends Controller
{
    public function index()
    {
        $dorms = Dormitory::with('allChildrenDorms')->where('is_unit_building','1')->get();
        return $this->response->array($dorms)->setStatusCode(201);
    }
}
