<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $time = date('Y-m-d h:i:s', time());
        $image_path=  resource_path().'/assets/js/assets/icon/';
        $categories = [
            [
                'parent_id' => 0,
                'name' => '生活服务',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => '',
            ],[
                'parent_id' => 0,
                'name' => '增值服务',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => '',
            ],[
                'parent_id' => 0,
                'name' => '绿色公益',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => '',
            ],[
                'parent_id' => 1,
                'name' => '快速购电',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'yuezhifu.png',
            ],[
                'parent_id' => 1,
                'name' => '我的账单',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'zhangdan.png',
            ],[
                'parent_id' => 1,
                'name' => '电量电费',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'dianfei.png',
            ],[
                'parent_id' => 1,
                'name' => '电费余额',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'yue.png',
            ],[
                'parent_id' => 1,
                'name' => '故障报修',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'baoxiu.png',
            ],[
                'parent_id' => 1,
                'name' => '停电公告',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'gonggao.png',
            ],[
                'parent_id' => 1,
                'name' => '用电常识',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'changshi.png',
            ],[
                'parent_id' => 1,
                'name' => '投诉举报',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'tousu.png',
            ],[
                'parent_id' => 2,
                'name' => '自助复电',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'fudian.png',
            ],[
                'parent_id' => 2,
                'name' => '电商理财',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'licai.png',
            ],[
                'parent_id' => 2,
                'name' => '网点服务',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'fuwu.png',
            ],[
                'parent_id' => 3,
                'name' => '电商扶贫',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'fupin.png',
            ],[
                'parent_id' => 1,
                'name' => '低碳生活',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => $image_path.'ditan.png',
            ]
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
