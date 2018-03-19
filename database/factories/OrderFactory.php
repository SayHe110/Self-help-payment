<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'order_num' => mt_rand(),
        'money' => rand(50, 100),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
