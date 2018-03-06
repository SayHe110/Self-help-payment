<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Image::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        // 轮播图图片
        'type' => 'carousel_figure',
        'updated_at' => $updated_at,
        'created_at' => $created_at,
    ];
});
