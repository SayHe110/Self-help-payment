<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    $time = $faker -> dateTimeThisMonth();

    return [
        'student_id' => random_int(10000,90000),
        'password' => bcrypt('password'),
        'nickname' => $faker->name(),
        'remember_token' => str_random(10),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
