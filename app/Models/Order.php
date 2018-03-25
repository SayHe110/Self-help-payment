<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_num', 'dorm_id', 'money'];

    public function getStateAttribute($value)
    {
        if($value){
            return '已处理';
        }else{
            return '未处理';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }

}
