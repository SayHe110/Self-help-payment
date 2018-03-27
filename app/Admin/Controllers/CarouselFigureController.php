<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;

class CarouselFigureController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            return $content->body($this->grid());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content)use($id){
            return $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content){
            return $content->body($this->storeForm());
        });
    }

    public function form()
    {
        return Admin::form(Image::class, function (Form $form){
            $form->image('path', '图片')->move('carousel_figure/')->uniqueName();
        });
    }

    public function storeForm()
    {
        return Admin::form(Image::class, function (Form $form){
            $form->select('type', '类型')->options(['carousel_figure']);
            $form->image('path', '图片')->move('carousel_figure/')->uniqueName();
        });
    }

    public function grid()
    {
        return Admin::grid(Image::class, function (Grid $grid){
            $grid->model()->orderBy('id', 'DESC');
            $grid->model()->where('type', 'carousel_figure');

            $grid->id('ID');
            $grid->user()->nickname('用户名');
            $grid->type();
            $grid->path('图片')->image(config('app.url'),100,50);
        });
    }


}
