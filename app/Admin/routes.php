<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', 'UserController');
    $router->resource('categories', 'CategoryController');
    $router->resource('topics', 'TopicController');
    // $router->resource('orders', 'OrderController');
    $router->get('orders/index', 'OrderController@index');
    $router->get('orders/untreated', 'OrderController@untreatedIndex');
    $router->get('orders/processed', 'OrderController@processedIndex');
});
