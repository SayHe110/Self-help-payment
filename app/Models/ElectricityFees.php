<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricityFees extends Model
{
    protected $fillable = ['dormitory_id', 'balance_of_electricity'];

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }
}
