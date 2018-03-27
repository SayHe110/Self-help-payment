<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable{
        notify as protected laravelNotify;
    }

    protected $fillable = ['order_num', 'dorm_id', 'money'];

    public function notify($instance)
    {
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }


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
