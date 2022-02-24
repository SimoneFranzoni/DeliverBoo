<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    { 
        for($i = 0; $i < 30; $i++) {
          $newRestaurant = new Restaurant();
          $newRestaurant->name = $faker->sentence(3);
          $newRestaurant->slug = Restaurant::generateSlug($newRestaurant->name);
          $newRestaurant->city = $faker->city;
          $newRestaurant->address = $faker->streetAddress;
          $newRestaurant->zip_code = $faker->postcode;
          $newRestaurant->phone_number = $faker->e164PhoneNumber;
          $newRestaurant->p_iva = $faker->randomNumber(11);
          $newRestaurant->save();
        }
    }
}
