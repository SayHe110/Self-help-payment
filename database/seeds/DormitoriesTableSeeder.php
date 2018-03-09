<?php

use Illuminate\Database\Seeder;
use App\Models\Dormitory;
use App\Models\Building;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=10;$i++){
            DB::table('unit_buildings')->insert([
                'unit_number' => $i,
            ]);
        }

        $build = [
            [
                'building' => 'A',
            ],[
                'building' => 'B',
            ],
        ];
        Building::insert($build);

        for($i=1;$i<=5;$i++){
            for($j=1;$j<=20;$j++){
                $j = strlen($j)==1 ? '0'.$j : $j;
                $dorm_num = $i.$j;
                DB::table('dormitories')->insert([
                    'dorm_num' => $dorm_num,
                ]);
            }
        }
    }
}
