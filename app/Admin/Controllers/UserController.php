<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\CheckRow;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\User;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use function foo\func;

class UserController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content){
            $content ->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(User::class, function (Grid $grid){
            $grid->id('ID')->sortable();
            $grid->student_id('学号');
            $grid->nickname('昵称');
            $grid->avatar()->image(30,30);
            $grid->email('邮箱');
            // todo 显示有待更改
            $grid->dormitory_id('宿舍号');

            $grid->actions(function ($actions){
                $actions->getKey();
                $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
            });

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

    public function show($id)
    {
        return $this->edit($id);
    }

    public function update($id)
    {
        return $this->form()->update($id);
    }

    public function destroy($id)
    {
        return $this->form()->destroy($id);
    }

    public function form()
    {
        return Admin::form(User::class, function (Form $form){
            $form->text('student_id', '学号');
            $form->email('email', '邮箱地址');
            $form->text('nickname', '昵称');
            $form->image('avatar', '头像');
            // todo 宿舍号待修改
            $form->text('dormitory_id', '宿舍号');
            $form->switch('is_verify')->states();
            $form->datetime('created_at', '创建时间');
            $form->datetime('updated_at', '更新时间');
        });
    }
}