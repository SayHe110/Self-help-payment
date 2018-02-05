<?php

use Illuminate\Database\Seeder;
use App\Models\Dormitory;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $droms = factory(Dormitory::class)->times(20)->make();

        Dormitory::insert($droms->toArray());
    }
}
