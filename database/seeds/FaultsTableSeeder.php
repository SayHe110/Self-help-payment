<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dormitory;
use App\Models\Fault;

class FaultsTableSeeder extends Seeder
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
        $dorms = Dormitory::where('type', 'dormitory')->get()->pluck('dorm_name')->toArray();

        $faults = factory(\App\Models\Fault::class)
                    ->times(50)
                    ->make()
                    ->each(function ($fault, $index) use ($faker, $users_id, $dorms){
                        $fault->user_id = $faker->randomElement($users_id);
                        $fault->dormitory = $faker->randomElement($dorms);
                    })->toArray();

        Fault::insert($faults);
    }
}
