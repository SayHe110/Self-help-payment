<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DormitoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(adminMenuTableSeeder::class);
        $this->call(FaultsTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
