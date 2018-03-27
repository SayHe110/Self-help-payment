<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['user_id', 'type', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setPathAttribute($path)
    {
        // 如果不是 'uploads' 开头则是后台上传
        if(! starts_with($path, '/uploads')){
            $path = '/uploads/'.$path;
        }

        $this->attributes['path'] = $path;
    }
}
