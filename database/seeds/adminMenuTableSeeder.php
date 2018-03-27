<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Permission;

class adminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name'     => 'Administrator',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '用户列表',
                'icon'      => 'fa-bars',
                'uri'       => 'users',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '文章列表',
                'icon'      => 'fa-clipboard',
                'uri'       => 'topics',
            ],
            [
                'parent_id' => 0,
                'order'     => 3,
                'title'     => '分类',
                'icon'      => 'fa-bars',
                'uri'       => 'categories',
            ],
            [
                'parent_id' => 0,
                'order'     => 4,
                'title'     => '订单管理',
                'icon'      => 'fa-file-text-o',
                'uri'       => '',
            ],
            [
                'parent_id' => 0,
                'order'     => 5,
                'title'     => '后台管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 5,
                'order'     => 6,
                'title'     => '管理员列表',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 5,
                'order'     => 7,
                'title'     => '角色管理',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 5,
                'order'     => 8,
                'title'     => '权限列表',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],[
                'parent_id' => 5,
                'order'     => 9,
                'title'     => '菜单管理',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],[
                'parent_id' => 5,
                'order'     => 10,
                'title'     => '操作日志',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ],[
                'parent_id' => 4,
                'order'     => 0,
                'title'     => '所有订单',
                'icon'      => 'fa-clone',
                'uri'       => 'orders/index',
            ],[
                'parent_id' => 4,
                'order'     => 0,
                'title'     => '已处理订单',
                'icon'      => 'fa-check',
                'uri'       => 'orders/processed',
            ],[
                'parent_id' => 4,
                'order'     => 0,
                'title'     => '未处理订单',
                'icon'      => 'fa-close',
                'uri'       => 'orders/untreated',
            ]
        ]);

        // add role to menu.
        Menu::find(4)->roles()->save(\Encore\Admin\Auth\Database\Role::first());
    }
}
