<?php

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\User;

class ImagesTableSeeder extends Seeder
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
        // 轮播图假数据
        $images = [
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192321-106.jpg',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192335-190.png',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192344-781.png',
            'http://blog.sayhe110.cn/uploads/markdown/20180306-192358-797.png',
        ];

        $carousel_figures = factory(\App\Models\Image::class)
            ->times(4)
            ->make()
            ->each(function ($image, $index) use ($faker, $users_id, $images){
                $image -> user_id = $faker->randomElement($users_id);
                $image -> path = $faker->randomElement($images);
            });

        Image::insert($carousel_figures->toArray());
    }
}
