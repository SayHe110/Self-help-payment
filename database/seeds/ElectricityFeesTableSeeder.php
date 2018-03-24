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
        // $faker = app(Faker\Generator::class);
        $time = date('Y-m-d H:i:s', time());
        $dormitories_id = Dormitory::where('type', 'dormitory')->pluck('id')->toArray();

        foreach ($dormitories_id as $item){
            DB::table('electricity_fees')->insert([
                'dormitory_id' => $item,
                'balance_of_electricity' => random_int(10, 100),
                'updated_at' => $time,
                'created_at' => $time,
            ]);
        }

//        $eles = factory(ElectricityFees::class)
//                ->times(100)
//                ->make()
//                ->each(function ($ele, $index) use ($faker, $dormitories_id){
//                    $ele->dormitory_id = $faker->randomElement($dormitories_id);
//                    $ele->balance_of_electricity = random_int(10, 100);
//                })->toArray();
//
//        ElectricityFees::insert($eles);
    }
}
