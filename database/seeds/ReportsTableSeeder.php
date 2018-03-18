<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = factory(\App\Models\Report::class)
                    ->times(50)
                    ->make()
                    ->toArray();
        \App\Models\Report::insert($reports);
    }
}
