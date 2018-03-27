<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace'=>'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings']
], function ($api){
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ],function ($api){
        // 图片验证码
        $api->get('captchas', 'CaptchasController@store')->name('api.captchas.store');
        // 用户注册
        $api->post('users', 'UserController@store')->name('api.users.store');
        // 登录 (可以邮箱、学号进行登录) 目前使用学号进行登录   遇到了什么的BUG  邮箱地址有时可以登录，有时不可以
        $api->post('authorizations','AuthorizationsController@store')->name('api.authorizations.store');
        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')->name('api.authorizations.update');
        // 删除token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')->name('api.authorizations.destroy');
    });

    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),
    ], function ($api) {
        // 游客可以访问的接口
        // 轮播图
        $api->get('carousel_figure', 'ImagesController@carousel_figure')->name('api.image.carousel_figure');
        // 宿舍号
        $api->get('dormitories', 'DormitoriesController@index')->name('api.dormitories.index');
        // 根据宿舍ID返回宿舍名称  9A105
        $api->get('dormitories/{dormitory}', 'DormitoriesController@show')->name('api.dormitories.show');
        // 文章列表 ?include=user
        $api->get('topics', 'TopicController@index')->name('api.topic.index');
        // 文章详情 ?include=user
        $api->get('topics/{topic}', 'TopicController@show')->name('api.topics.show');
        // 停电公告
        $api->get('power_failure', 'TopicController@powerFailure')->name('api.topic.powerFailure');
        // 用电常识
        $api->get('use_electrical_sense', 'TopicController@useElectricalSense')->name('api.topic.use_electrical_sense');
        // 分类列表
        $api->get('categories', 'CategoriesController@index')->name('api.categories.index');
        // 某个分类下的文章(用电常识、停电公告, 故障报修除外)
        $api->get('categories/{category}', 'CategoriesController@show')->name('api.categories.show');

        // 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function($api) {
            // 当前登录用户信息 ?include=dormitory
            $api->get('user', 'UserController@me')->name('api.user.show');
            // 支付密码
            $api->post('payment_password', 'UserController@paymentPassword')->name('api.user.payment_password');
            // 修改密码
            $api->post('user/reset', 'UserController@reset')->name('api.user.reset');
            // 用户修改宿舍
            $api->post('user/reset_dorm', 'UserController@resetDorm')->name('api.user.reset_dorm');
            // 修改昵称
            $api->post('user/reset_nickname', 'UserController@resetNickname')->name('api.user.reset_nickname');
            // 修改支付密码
            $api->post('users/reset_payment_password', 'UserController@resetPaymentPassword')->name('api.uses.resetPaymentPassword');
            // 上传头像
            $api->post('images', 'ImagesController@store')->name('api.images.store');
            // 发布文章
            $api->post('topics', 'TopicController@store')->name('api.topic.store');
            // 故障报修
            $api->post('faults', 'FaultsController@store')->name('api.fault.store');
            // 投诉举报
            $api->post('reports', 'ReportsController@store')->name('api.reports.store');
            // 提交订单
            $api->post('orders', 'OrderController@store')->name('api.orders.store');
            // 我的订单 ?include=dormitory
            $api->get('orders', 'OrderController@me')->name('api.orders.show');
            // 电费余额
            $api->get('electricity_balance', 'ElectricityFeesController@show')->name('api.Electricity.show');

            // 通知列表
            $api->get('user/notifications', 'NotificationsController@index')->name('api.user.notifications.index');
            // 通知统计
            $api->get('user/notifications/stats', 'NotificationsController@stats')->name('api.user.notifications.stats');
            // 标记消息通知为已读
            $api->patch('user/read/notifications', 'NotificationsController@read')
                ->name('api.user.notifications.read');
        });
    });
});
