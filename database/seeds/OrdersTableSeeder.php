<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            
            $new_order = new Order();

            $new_order->email = $faker->email();
            $new_order->name = $faker->firstName();
            $new_order->surname = $faker->lastName();
            $new_order->telephone_guest = $faker->phoneNumber();
            $new_order->address = $faker->address();
            $new_order->date_delivery = $faker->date();
            $new_order->time_delivery = $faker->time();
            $new_order->total_price = $faker->numberBetween(5, 30);
            $new_order->note = $faker->text(100);
            $new_order->slug = Restaurant::generateSlug($new_order->email);

            $new_order->save();


        }
    }
}
