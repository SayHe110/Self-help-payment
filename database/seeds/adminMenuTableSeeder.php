<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;

class adminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '用户列表',
                'icon'      => 'fa-bars',
                'uri'       => '/users',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '文章列表',
                'icon'      => 'fa-clipboard',
                'uri'       => '',
            ],
            [
                'parent_id' => 0,
                'order'     => 3,
                'title'     => '分类',
                'icon'      => 'fa-bars',
                'uri'       => '',
            ],
            [
                'parent_id' => 0,
                'order'     => 4,
                'title'     => '后台管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 4,
                'order'     => 5,
                'title'     => '管理员列表',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 4,
                'order'     => 6,
                'title'     => '角色管理',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 4,
                'order'     => 7,
                'title'     => '权限列表',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],[
                'parent_id' => 4,
                'order'     => 8,
                'title'     => '菜单管理',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],[
                'parent_id' => 4,
                'order'     => 9,
                'title'     => '操作日志',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ]
        ]);

        // add role to menu.
        Menu::find(4)->roles()->save(\Encore\Admin\Auth\Database\Role::first());
    }
}
