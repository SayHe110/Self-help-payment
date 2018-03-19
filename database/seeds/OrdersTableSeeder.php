<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dormitory;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
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

        $orders = factory(Order::class)
                    ->times(100)
                    ->make()
                    ->each(function ($order, $index) use($faker, $users_id, $dorms_id){
                        $order->user_id = $faker->randomElement($users_id);
                        $order->dorm_id = $faker->randomElement($dorms_id);
                    })->toArray();

        Order::insert($orders);
    }
}
