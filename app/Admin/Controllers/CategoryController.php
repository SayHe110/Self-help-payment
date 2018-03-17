<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;
use function foo\func;

class CategoryController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content->body($this->tree());
        });
    }

    public function tree()
    {
        return Category::tree(function (Tree $tree){
            $tree->branch(function($branch){
                $src = $branch['title_image_path'];
                $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

                return "{$branch['id']} - {$branch['name']} $logo";
            });
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id){
            $content->header('编辑分类');
            $content->body($this->form()->edit($id));
        });
    }

    protected function form()
    {
        return Category::form(function (Form $form){
            $form->display('id', 'ID');
            $form->select('parent_id')->options(Category::selectOptions());
            $form->text('name', '名称')->rules('required');
            $form->image('title_image_path');
            $form->text('url', '跳转地址');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }

}
