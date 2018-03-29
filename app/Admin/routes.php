<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    // 用户
    $router->resource('users', 'UserController');
    // 分类
    $router->resource('categories', 'CategoryController');
    // 文章
    $router->resource('topics', 'TopicController');
    // 所有订单列表
    $router->get('orders/index', 'OrderController@index');
//    $router->get('orders/untreated', 'OrderController@untreatedIndex');
//    $router->get('orders/untreated/{order}/edit', 'OrderController@untreatedEdit');
//    $router->post('orders/untreated/update', 'OrderController@untreatedUpdate');
    // 已处理订单
    $router->get('orders/processed', 'OrderController@processedIndex');
    // 未处理订单
    $router->resource('orders/untreated', 'UntreatedOrderController');
    // 轮播图
    $router->resource('carouselFigure', 'CarouselFigureController');
    // 投诉举报
    $router->resource('reports', 'ReportController');
    // 故障报修
    $router->resource('faults', 'FaultController');
});
