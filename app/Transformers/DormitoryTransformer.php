<?php

namespace App\Transformers;

use App\Models\Dormitory;
use League\Fractal\TransformerAbstract;

class DormitoryTransformer  extends TransformerAbstract
{
    public function transform(Dormitory $dormitory)
    {
        // todo
//        return [
//            'dorm_id' => $dormitory->id,
//            'dorm_name'
//        ];
    }
}