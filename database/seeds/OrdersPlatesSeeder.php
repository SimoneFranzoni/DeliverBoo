<?php

use App\Order;
use App\Plate;
use Illuminate\Database\Seeder;

class OrdersPlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i= 0; $i < 50; $i++) {
            $order = Order::inRandomOrder()->first();
            $plate_id = Plate::inRandomOrder()->first()->id;
            $order->plates()->attach($plate_id);
        }
    }
}
