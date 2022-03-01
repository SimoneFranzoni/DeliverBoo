<?php

use App\Plate;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      $categories = [
        'Antipasto', 'Primo', 'Secondo', 'Contorno', 'Frutta', 'Dessert'
      ];

        for ($i = 0; $i < 30; $i++) {
          $newPlate = new Plate();
          $newPlate->name = $faker->sentence(4);
          $newPlate->slug = Plate::generateSlug($newPlate->name);
          $newPlate->description = $faker->sentence(10);
          $newPlate->is_available = $faker->boolean(80);
          $newPlate->price = $faker->randomFloat(2, 0, 99);
          $newPlate->ingrediants = $faker->words(5, true);
          $newPlate->category = $categories[array_rand($categories, 1)];
          $newPlate->save();
        }
    }
}
