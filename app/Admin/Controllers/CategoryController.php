<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use function foo\func;

class CategoryController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content->body($this->grid());
        });
    }



    public function grid()
    {
        return Admin::grid(Category::class, function (Grid $grid){
            $grid->id('ID');
            $grid->parent_id('父类ID');
            $grid->name('分类名称');
            $grid->title_image_path()->image(30, 30);
            $grid->url('跳转地址');
        });
    }
}
