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

    public function index()
    {
        return Admin::content(function (Content $content){
            $content -> header('订单管理');

            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid){
            $grid->model()->orderBy('DESC');

            $grid->id('ID')->sortable();
            $grid->user()->nickname('用户');
            $grid->order_num('订单号');
            // $gri

        });
    }
}
