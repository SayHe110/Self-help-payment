<?php

namespace App\Http\Controllers\Api;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoriesController extends Controller
{
    public function index()
    {
        $dorms = Dormitory::with('allChildrenDorms')->get();
        return $dorms;
    }
}
