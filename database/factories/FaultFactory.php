<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Fault::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'title' => $faker->sentence(),
        'description' => $faker->sentence(),
        'phone' => $faker->phoneNumber,
        'arrival_processing' => $faker->boolean(),
        'updated_at' => $updated_at,
        'created_at' => $created_at,
    ];
});
