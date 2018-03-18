<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\CheckRow;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\User;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use function foo\func;

class UserController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content ->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(User::class, function (Grid $grid){
            $grid->model()->orderBy('id', 'DESC');

            $grid->paginate(15);

            $grid->id('ID')->sortable();
            $grid->student_id('学号');
            $grid->nickname('昵称');
            $grid->avatar()->image(30,30);
            $grid->email('邮箱');
            // todo 显示有待更改
            $grid->dormitory_id('宿舍号');
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id){
            $content->header('用户');
            $content->description('编辑用户');

            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content){
            $content->header('用户');
            $content->description('新增用户');

                $content->body($this->storeForm());
        });
    }

    public function store()
    {
        return $this->storeForm()->store();
    }

    public function storeForm()
    {
        return Admin::form(User::class, function (Form $form){
            // 构建图片（文件）存储规则
            $folder_name = 'uploads/images/avatars/'.date('Ym',time()).'/'.date('d',time());

            $form->text('student_id', '学号');
            $form->password('password', '密码');
            $form->email('email', '邮箱地址')->rules('unique:users',[
                'unique' => '邮箱地址已经存在',
            ]);
            $form->text('nickname', '昵称');
            // todo 图片显示有问题
            $form->image('avatar', '头像')->move($folder_name);

            // todo 宿舍号待修改
            $form->text('dormitory_id', '宿舍号');
            $form->switch('is_verify', '是否已验证')->states();
        });
    }

    public function form()
    {
        return Admin::form(User::class, function (Form $form){
            $form->display('student_id', '学号');
            $form->email('email', '邮箱地址')->rules('unique:users',[
                'unique' => '邮箱地址已经存在',
            ]);
            $form->text('nickname', '昵称');
            $form->image('avatar', '头像');
            // todo 宿舍号待修改
            $form->text('dormitory_id', '宿舍号');
            $form->switch('is_verify', '是否已验证')->states();
            $form->datetime('created_at', '创建时间');
            $form->datetime('updated_at', '更新时间');
        });
    }
}