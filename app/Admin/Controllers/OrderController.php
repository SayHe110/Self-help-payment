<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use function foo\func;

class OrderController extends Controller
{
    use ModelForm;

    public function untreatedIndex()
    {
        return Admin::content(function (Content $content){
            $content -> header('订单管理');

            $content->body($this->untreatedGrid());
        });
    }

    public function untreatedGrid()
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

    public function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid){
            $grid->model()->orderBy('id', 'DESC');

            $grid->id('ID')->sortable();
            $grid->user()->nickname('用户');
            $grid->order_num('订单号');
            $grid->dormitory()->dorm_name('宿舍号');
            $states = [
                'on' => ['text' => 'YES'],
                'off' => ['text' => 'NO'],
            ];
            $grid->is_handle('是否处理')->switch($states);
        });
    }
}
