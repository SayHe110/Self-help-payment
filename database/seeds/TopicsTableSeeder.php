<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topic;
use App\Models\Category;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $users_id = User::all()->pluck('id')->toArray();

        $categories_id = Category::all()->pluck('id')->toArray();
        $parent_cates = [1, 2, 3];

        // 剔除主分类ID
        foreach ($parent_cates as $parent_cate){
            $key = array_search($parent_cate, $categories_id);
            if($key !== false)
                array_splice($categories_id, $key, 1);
        }

        $images = [
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192321-106.jpg',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192335-190.png',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192344-781.png',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192358-797.png',
        ];

        $topics = factory(Topic::class)
            ->times(50)
            ->make()
            ->each(function ($topic, $index) use ($faker, $categories_id, $users_id, $images){
                $topic->category_id = $faker -> randomElement($categories_id);
                $topic->user_id = $faker -> randomElement($users_id);
                $topic->title_image_path = $faker -> randomElement($images);
            })->toArray();

        Topic::insert($topics);
    }
}
