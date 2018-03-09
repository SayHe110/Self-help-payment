<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = ['dorm_name', 'parent_dorm_code', 'is_unit_building'];

//    public function parentDorm()
//    {
//        return $this->belongsTo('App\Models\Dormitory', 'parent_dorm_code', 'dorm_id');
//    }

    public function childrenDorm()
    {
        return $this->hasMany('App\Models\Dormitory', 'parent_dorm_code', 'dorm_id');
    }

    public function allChildrenDorms()
    {
        return $this->childrenDorm()->with('allChildrenDorms');
    }

}
