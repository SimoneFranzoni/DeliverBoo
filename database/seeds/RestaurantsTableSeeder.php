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

        foreach(config('restaurants') as $restaurant){
          $newRestaurant = new Restaurant();
          $numberRandom = $this->getRandomNumber(1, 123);
          $newRestaurant->name = $restaurant['name'];
          $newRestaurant->slug = Restaurant::generateSlug($restaurant['name']);
          $newRestaurant->city = $restaurant['city'];
          $newRestaurant->address = $restaurant['address'];
          $newRestaurant->zip_code = $restaurant['zip_code'];
          $newRestaurant->phone_number = $restaurant['phone_number'];
          $newRestaurant->p_iva = strval(Restaurant::randomNumber(11));
          $newRestaurant->cover = $this->getImgRestaurant($numberRandom);
          $newRestaurant->cover_original_name = 'ristorante (' . $numberRandom . ').jpg';
          $newRestaurant->save();
        }



        // for($i = 0; $i < 5; $i++) {
        //   $newRestaurant = new Restaurant();
        //   $newRestaurant->name = $faker->sentence(3);
        //   $newRestaurant->slug = Restaurant::generateSlug($newRestaurant->name);
        //   $newRestaurant->city = $faker->city;
        //   $newRestaurant->address = $faker->streetAddress;
        //   $newRestaurant->zip_code = strval($faker->postcode);
        //   $newRestaurant->phone_number = strval($faker->e164PhoneNumber);
        //   $newRestaurant->p_iva = strval(Restaurant::randomNumber(11));
        //   $newRestaurant->save();
        // }
        // for($i = 0; $i < 500; $i++) {
        //   $newRestaurant = new Restaurant();

        //   $numberRandom = $this->getRandomNumber(1, 123);
        //   $newRestaurant->name = $faker->sentence(3);
        //   $newRestaurant->user_id = 1;
        //   $newRestaurant->slug = Restaurant::generateSlug($newRestaurant->name);
        //   $newRestaurant->city = $faker->city;
        //   $newRestaurant->address = $faker->streetAddress;
        //   $newRestaurant->zip_code = strval($faker->postcode);
        //   $newRestaurant->phone_number = strval($faker->e164PhoneNumber);
        //   $newRestaurant->cover = $this->getImgRestaurant($numberRandom);
        //   $newRestaurant->cover_original_name = 'ristorante (' . $numberRandom . ').jpg';
        //   $newRestaurant->p_iva = strval(Restaurant::randomNumber(11));
        //   $newRestaurant->save();
        // }
    }

    public function getRandomNumber($min, $max){
      $numberRandom = rand($min, $max);
      return $numberRandom;
    }

    private function getImgRestaurant($numberRandom){
      $imgPath = 'uploads/img/restaurant_icon/ristorante (' . $numberRandom . ').jpg';
      return $imgPath;
    }

}
