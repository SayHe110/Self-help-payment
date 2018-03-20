<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = ['dorm_name', 'parent_dorm_code', 'is_unit_building'];

    public function childrenDorm()
    {
        return $this->hasMany('App\Models\Dormitory', 'parent_dorm_id', 'id');
    }

    public function allChildrenDorms()
    {
        return $this->childrenDorm()->with('allChildrenDorms');
    }

    public function parentDorm()
    {
        return $this->hasOne('App\Models\Dormitory', 'id', 'parent_dorm_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
