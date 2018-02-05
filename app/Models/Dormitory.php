<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = ['dorm_number'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
