<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = ['dorm_name', 'parent_dorm_code'];

    public function getDormAttribute()
    {
        if($this->type == 'dormitory'){
            return $this->getDormName($this->id);
        }

        return $this->dorm_name;
    }

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
        return $this->belongsTo('App\Models\Dormitory', 'parent_dorm_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function electricityFees()
    {
        return $this->hasMany(ElectricityFees::class);
    }

    /**
     * 拼接宿舍名
     * @param $id
     * @return string
     */
    public function getDormName($id)
    {
        $dormitory = Dormitory::findOrFail($id);

        if($dormitory->allChildrenDorms()){

            $building = $dormitory->parentDorm;
            $unit = $building->parentDorm->dorm_name;
            $name = $unit.$building->dorm_name.$dormitory->dorm_name;

            return $name;
        }

        return $dormitory->dorm_name;
    }
}
