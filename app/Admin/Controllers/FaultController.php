<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fault;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;

class FaultController extends Controller
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
            $content->body($this->form()->edit($id));
        });
    }

    public function grid()
    {
        return Admin::grid(Fault::class, function (Grid $grid){
            $grid->model()->orderBy('updated_at', 'DESC');

            $grid->id('ID');
            $grid->user()->nickname('用户名');
            $grid->title('标题');
            $grid->dormitory();
            $states = [
                'on' => ['text' => '是'],
                'off' => ['text' => '否']
            ];
            $grid->arrival_processing()->switch($states);
        });
    }

    public function form()
    {
        return Admin::form(Fault::class, function (Form $form){
            $form->display('id', 'ID');
            $form->display('user.nickname', '用户名');
            $form->text('title', '标题');
            $form->textarea('description', '描述');
            $form->dormitory('宿舍号');
            $form->phone('手机号');
            $states = [
                'on' => ['text'=>'是'],
                'off' => ['text'=>'否']
            ];
            $form->switch('arrival_processing', '是否需要现场处理')->states($states);
        });
    }

}
