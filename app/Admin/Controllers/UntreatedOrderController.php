<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dormitory;
use App\Models\Order;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class UntreatedOrderController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content -> header('订单管理');

            $content->breadcrumb(
                ['text' => '订单管理'],
                ['text' => '未处理订单']
            );

            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid){
            $grid->model()->where('is_handle',0);
            $grid->model()->orderBy('id', 'DESC');

            $grid->id('ID')->sortable();
            $grid->user()->nickname('用户');
            $grid->order_num('订单号');
            $grid->dormitory()->dorm_name('宿舍号');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content){
            return $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id){
            $content->header('编辑订单');
            $content->body($this->form()->edit($id));
        });
    }

    public function form()
    {
        return Admin::form(Order::class, function (Form $form){
            $form->display('id', 'ID');
            $form->display('user.nickname', '用户名');
            $form->display('order_num', '订单号');
            $form->select('dormitory_id','宿舍号')->options(Dormitory::all()->pluck('dorm_name', 'id'));
            $form->text('money', '金额');

            $states = [
                'on' => ['text' => '处理'],
                'off' => ['text' => '不处理'],
            ];

            $form->switch('is_handle', '是否处理')->states($states);
        });
    }

    public function storeForm()
    {
        return Admin::form(Order::class, function (Form $form){
            $form->text('dormitory_id', '宿舍ID');
            $form->text('money', '金额');
            $form->saving(function (Form $form){
                return $form->user_id = \Auth::id();
            });
        });
    }
}
