<?php

use App\Order;
use App\Restaurant;
use Illuminate\Database\Seeder;

class UpdateOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        foreach($orders as $order){
            $restaurant = Restaurant::inRandomOrder()->first()->id;
            $order->restaurant_id = $restaurant;
            $order->update();
        }
    }
}
