<?php

namespace App\Transformers;

use App\Models\Dormitory;
use App\Models\UnitBuilding;
use League\Fractal\TransformerAbstract;

class DormitoryTransformer  extends TransformerAbstract
{
    protected $availableIncludes = ['building'];
    public function transform(UnitBuilding $unitBuilding)
    {
        return [
            'id' => $unitBuilding->id,
            'unit_number' => $unitBuilding->unit_number,
        ];
    }

    public function includeBuilding(UnitBuilding $unitBuilding)
    {
        // return $this->item($unitBuilding->buildings, new )
    }
}