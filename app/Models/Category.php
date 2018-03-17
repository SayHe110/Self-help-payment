<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use AdminBuilder, ModelTree;

    protected $fillable = ['name', 'title_image_path', 'url'];

    // 修改后台管理分类列表需要用到的字段
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTitleColumn('name');
    }

    public function childrenCate()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

}
