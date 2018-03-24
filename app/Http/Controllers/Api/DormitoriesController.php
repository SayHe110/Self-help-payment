<?php

namespace App\Http\Controllers\Api;

use App\Models\Dormitory;
use App\Transformers\DormitoryTransformer;
use Illuminate\Http\Request;

class DormitoriesController extends Controller
{
    public function index()
    {
        $dorms = Dormitory::with('allChildrenDorms')->where('type', 'unit')->get();

        return $this->response->array($dorms)->setStatusCode(201);
    }

    public function show(Dormitory $dormitory)
    {
        return $this->response->item($dormitory, new DormitoryTransformer())->setStatusCode(201);
    }

}
