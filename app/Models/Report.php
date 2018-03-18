<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['user_id', 'title', 'reports', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
