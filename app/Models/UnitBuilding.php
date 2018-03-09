<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitBuilding extends Model
{
    protected $fillable = ['unit_number'];

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
