<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'title_image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
