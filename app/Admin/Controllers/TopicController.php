<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use function foo\func;

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

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id){
            $content->header('编辑文章');
            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content){
            $content->header('添加文章');
            $content->body($this->form());
        });
    }

    public function grid()
    {
        return Admin::grid(Topic::class, function (Grid $grid){
            $grid->model()->orderBy('id', 'DESC');
            $grid->paginate(10);

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->title_image_path('标题图片')->image(config('app.url'),60, 60);
            $grid->category()->name('分类');
            $grid->user()->nickname('作者');
        });
    }

    public function form()
    {
        return Admin::form(Topic::class, function (Form $form){
            $form->display('id', 'ID');
            $form->text('title', '标题');
            $form->select('category_id', '分类')->options(Category::all()->pluck('name', 'id'));
            // todo 富文本编辑器
            $form->textarea('body', '内容')->rows(10);
            $form->image('title_image_path')->move('topics/')->uniqueName();
            $form->select('user_id', '作者')->options(function ($id){
                $user = User::find($id);

                if($user)
                    return [$user->id => $user->nickname];
            });
            $form->display('view_count', '阅读量');
            $form->text('excerpt', '摘录');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
            $form->hidden('user_id')->value(Admin::user()->id);
        });
    }

    // todo 获取不到 body
    public function storeForm()
    {
        return Admin::form(Topic::class, function (Form $form){
            $form->text('title', '标题');
            $form->select('category_id', '分类')->options(Category::all()->pluck('name', 'id'));
            // todo 富文本编辑器
            $form->text('body');
            $form->image('title_image_path');
            $form->hidden('user_id')->value(Admin::user()->id);
        });
    }

}
