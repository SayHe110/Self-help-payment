<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class TopicController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content->header('文章列表');

            $content->body($this->grid());
        });
    }


    public function grid()
    {
        return Admin::grid(Topic::class, function (Grid $grid){
            $grid->model()->orderBy('id', 'DESC');

            $grid->paginate(10);

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->title_image_path('标题图片')->image(60, 60);
            $grid->category()->name('分类');
            $grid->user()->nickname('作者');
        });
    }

}
