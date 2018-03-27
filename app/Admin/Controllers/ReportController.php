<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ReportController extends Controller
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
        return Admin::grid(Report::class, function (Grid $grid){
            $grid->model()->orderBy('updated_at', 'DESC');

            $grid->id('Id');
            $grid->title('标题');
            $grid->reports('投诉人/单位');
            $states = [
                'on' => ['text' => '已解决'],
                'off' => ['text' => '未解决'],
            ];
            $grid->is_solve('是否已解决')->switch($states);
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content)use($id){
            return $content->body($this->form()->edit($id));
        });
    }

    public function form()
    {
        return Admin::form(Report::class, function (Form $form){
            $form->display('id', 'ID');
            $form->display('user.nickname', '用户名');
            $form->text('title', '标题');
            $form->text('reports', '投诉人/单位');
            $form->textarea('description', '描述');
            $states = [
                'on' => ['text' => '已解决'],
                'off' => ['text' => '未解决'],
            ];
            $form->switch('is_solve', '是否解决')->states($states);
        });
    }
}
