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
        $building = ['A', 'B'];
        for ($i=1; $i<=5; $i++){
            $unit_buildingId = DB::table('dormitories')->insertGetId([
                'dorm_name' => $i.'单元',
                'is_unit_building' => true,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
            for ($j=0; $j<=1; $j++){
                $buildingId = DB::table('dormitories')->insertGetId([
                    'dorm_name' => $building[$j],
                    'parent_dorm_id' => $unit_buildingId,
                    //'is_unit_building' => ,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
                for ($z=1; $z<=2; $z++){
                    for ($k=1; $k<=2; $k++){
                        $dorm_name = strlen($k)==1 ? $z.'0'.$k : $z.$k;
                        DB::table('dormitories')->insert([
                            'dorm_name' => $dorm_name,
                            'parent_dorm_id' => $buildingId,
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                        ]);
                    }
                }
            }
        }
    }
}
