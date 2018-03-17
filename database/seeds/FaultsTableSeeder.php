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
        $dorms_id = Dormitory::where('is_unit_building', '=', 0)->get()->pluck('dorm_id')->toArray();

        $faults = factory(\App\Models\Fault::class)
                    ->times(50)
                    ->make()
                    ->each(function ($fault, $index) use ($faker, $users_id, $dorms_id){
                        $fault->user_id = $faker->randomElement($users_id);
                        $fault->dorm_id = $faker->randomElement($dorms_id);
                    })->toArray();

        Fault::insert($faults);
    }
}
