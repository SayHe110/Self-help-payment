<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 宿舍数据表填充
        $this->call(DormitoriesTableSeeder::class);
        // 用户数据表填充
        $this->call(UsersTableSeeder::class);
        // 图片数据表填充
        $this->call(ImagesTableSeeder::class);
        // 文章数据表填充
        $this->call(TopicsTableSeeder::class);
        // 后台管理菜单数据表填充
        $this->call(adminMenuTableSeeder::class);
        // 故障数据表填充
        $this->call(FaultsTableSeeder::class);
        // 投诉数据表填充
        $this->call(ReportsTableSeeder::class);
        // 订单数据表填充
        $this->call(OrdersTableSeeder::class);
        // 电费余额数据表填充
        $this->call(ElectricityFeesTableSeeder::class);
    }
}
