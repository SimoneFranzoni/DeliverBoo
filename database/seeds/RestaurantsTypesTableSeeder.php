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
        
        $restaurant = Restaurant::inRandomOrder()->first();
        $type_id = Type::inRandomOrder()->first()->id;
        $restaurant->types()->attach($type_id);

        
    }
}
