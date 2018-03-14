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
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182713-514.png',
            ],[
                'parent_id' => 1,
                'name' => '我的账单',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182304-335.png',
            ],[
                'parent_id' => 1,
                'name' => '电量电费',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-181944-845.png',
            ],[
                'parent_id' => 1,
                'name' => '电费余额',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182243-972.png',
            ],[
                'parent_id' => 1,
                'name' => '故障报修',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-181905-693.png',
            ],[
                'parent_id' => 1,
                'name' => '停电公告',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182059-887.png',
            ],[
                'parent_id' => 1,
                'name' => '用电常识',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-181932-222.png',
            ],[
                'parent_id' => 1,
                'name' => '投诉举报',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182140-925.png',
            ],[
                'parent_id' => 2,
                'name' => '自助复电',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182032-525.png',
            ],[
                'parent_id' => 2,
                'name' => '电商理财',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182126-406.png',
            ],[
                'parent_id' => 2,
                'name' => '网点服务',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182050-150.png',
            ],[
                'parent_id' => 3,
                'name' => '电商扶贫',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-182041-216.png',
            ],[
                'parent_id' => 1,
                'name' => '低碳生活',
                'created_at' => $time,
                'updated_at' => $time,
                'title_image_path' => 'http://blog.sayhe110.cn/uploads/markdown/20180314-181959-881.png',
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
