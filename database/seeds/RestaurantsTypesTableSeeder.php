<?php

use App\Restaurant;
use App\Type;
use Illuminate\Database\Seeder;

class RestaurantsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20; $i++){
            $restaurant = Restaurant::inRandomOrder()->first();
            $type_id = Type::inRandomOrder()->first()->id;
            $restaurant->types()->attach($type_id);

        }
    }
}
