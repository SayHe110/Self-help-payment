<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FaultRequest;
use App\Models\Fault;
use App\Transformers\FaultTransformer;
use Illuminate\Http\Request;

class FaultsController extends Controller
{
    public function store(FaultRequest $request, Fault $fault)
    {
        $fault->fill($request->all());
        $fault->user_id = $this->user()->id;
        $fault->save();

        return $this->response->item($fault, new FaultTransformer())->setStatusCode(201);
    }
}
