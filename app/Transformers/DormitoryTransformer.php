<?php

namespace App\Transformers;

use App\Models\Dormitory;
use League\Fractal\TransformerAbstract;

class DormitoryTransformer  extends TransformerAbstract
{
    public function transform(Dormitory $dormitory)
    {
        return [
            'id' => $dormitory->id,
            'dorm_number' => $dormitory->dorm_number,
        ];
    }
}