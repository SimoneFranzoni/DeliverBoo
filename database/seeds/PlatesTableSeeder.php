<?php

use App\Plate;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      // $categories = [
      //   'Antipasto', 'Primo', 'Secondo', 'Contorno', 'Frutta', 'Dessert'
      // ];

      foreach(config('plates') as $plate){
        $newPlate = new Plate();
        $newPlate->name = $plate['name'];
        $newPlate->description = $plate['description'];
        $newPlate->ingrediants = $plate['ingradiants'];
        $newPlate->price = $plate['price'];
        $newPlate->category = $plate['category'];

        if($newPlate->category === 'Antipasto'){
          $numberPlateRandom = $this->getRandomNumber(442, 473);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }

        elseif($newPlate->category === 'Primo'){
          $numberPlateRandom = $this->getRandomNumber(473, 532);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }

        elseif($newPlate->category === 'Secondo'){
          $numberPlateRandom = $this->getRandomNumber(1, 290);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }

        elseif($newPlate->category === 'Contorno'){
          $numberPlateRandom = $this->getRandomNumber(405, 441);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }

        elseif($newPlate->category === 'Frutta'){
          $numberPlateRandom = $this->getRandomNumber(291, 296);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }

        elseif($newPlate->category === 'Dessert'){
          $numberPlateRandom = $this->getRandomNumber(297, 404);
          $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
          $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
        }
        
        $newPlate->is_available = $faker->boolean(80);
        $newPlate->slug = Plate::generateSlug($newPlate->name);
        $newPlate->save();
      }

        // for ($i = 0; $i < 300; $i++) {
        //   $newPlate = new Plate();

        //   // $numberRestaurantRandom = $this->getRandomNumber(1, 123);
        //   // $newPlate->restaurant_id = $numberRestaurantRandom;
        //   $newPlate->name = $faker->sentence(3);
          
        //   $numberPlateRandom = $this->getRandomNumber(1, 532);
        //   $newPlate->cover = $this->getImgRestaurant($numberPlateRandom);
        //   $newPlate->cover_original_name = 'plate (' . $numberPlateRandom . ').jpg';
          
        //   $newPlate->slug = Plate::generateSlug($newPlate->name);
        //   $newPlate->description = $faker->sentence(10);
        //   $newPlate->is_available = $faker->boolean(80);
        //   $newPlate->price = $faker->randomFloat(2, 0, 99);
        //   $newPlate->ingrediants = $faker->words(5, true);
        //   $newPlate->category = $categories[array_rand($categories, 1)];
        //   $newPlate->save();
        // }

      }

      public function getRandomNumber($min, $max){
        $numberRandom = rand($min, $max);
        return $numberRandom;
      }

      private function getImgRestaurant($numberPlateRandom){
        if($numberPlateRandom > 0 && $numberPlateRandom < 291){
          $imgPath = 'uploads/img/plates/secondi/restaurant (' . $numberPlateRandom . ').jpg';
        }
        elseif($numberPlateRandom > 290 && $numberPlateRandom < 297){
          $imgPath = 'uploads/img/plates/frutta/restaurant (' . $numberPlateRandom . ').jpg';
        }
        elseif($numberPlateRandom > 296 && $numberPlateRandom < 405){
          $imgPath = 'uploads/img/plates/dessert/restaurant (' . $numberPlateRandom . ').jpg';
        }
        elseif($numberPlateRandom > 404 && $numberPlateRandom < 442){
          $imgPath = 'uploads/img/plates/contorno/restaurant (' . $numberPlateRandom . ').jpg';
        }
        elseif($numberPlateRandom > 441 && $numberPlateRandom < 474){
          $imgPath = 'uploads/img/plates/antipasto/restaurant (' . $numberPlateRandom . ').jpg';
        }
        elseif($numberPlateRandom > 473 && $numberPlateRandom < 533){
          $imgPath = 'uploads/img/plates/primi/restaurant (' . $numberPlateRandom . ').jpg';
        }
        return $imgPath;
      }
}