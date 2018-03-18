<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_num', 'dorm_id', 'money'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
