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
            'dorm_name' => $dormitory->dorm_name,
            'parent_dorm_id' => $dormitory->parent_dorm_id,
        ];
    }
}