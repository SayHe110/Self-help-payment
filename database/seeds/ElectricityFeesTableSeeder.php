<?php

use Illuminate\Database\Seeder;
use App\Models\Dormitory;
use App\Models\ElectricityFees;

class ElectricityFeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $dormitories_id = Dormitory::all()->pluck('id')->toArray();

        $eles = factory(ElectricityFees::class)
                ->times(100)
                ->make()
                ->each(function ($ele, $index) use ($faker, $dormitories_id){
                    $ele->dormitory_id = $faker->randomElement($dormitories_id);
                    $ele->balance_of_electricity = random_int(10, 100);
                })->toArray();

        ElectricityFees::insert($eles);
    }
}
