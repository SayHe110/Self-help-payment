<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = ['dorm_num'];

    public function unitBuilding()
    {
        return $this->belongsTo(UnitBuilding::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
