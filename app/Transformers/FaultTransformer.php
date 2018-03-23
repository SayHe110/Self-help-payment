<?php

namespace App\Transformers;

use App\Models\Fault;
use League\Fractal\TransformerAbstract;

class FaultTransformer extends TransformerAbstract
{
    public function transform(Fault $fault)
    {
        return [
            'id' => $fault->id,
            'user_id' => $fault->user_id,
            'title' => $fault->title,
            'description' => $fault->description,
            'dormitory' => $fault->dormitory,
            'phone' => $fault->phone,
            'arrival_processing' => $fault->arrival_processing,
            'processing_person' => $fault->processing_person,
            'created_at' => $fault->created_at->toDateTimeString(),
            'updated_at' => $fault->updated_at->toDateTimeString(),
        ];
    }
}