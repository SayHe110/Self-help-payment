<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'title_image_path', 'url'];

    public function childrenCate()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

}
