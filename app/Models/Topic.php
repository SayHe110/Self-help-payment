<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'title_image_path', 'category_id', 'excerpt', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setTitleImagePathAttribute($path)
    {
        if(! starts_with($path, '/uploads')){
            $path = '/uploads/'.$path;
        }

        $this->attributes['title_image_path'] = $path;
    }
}
