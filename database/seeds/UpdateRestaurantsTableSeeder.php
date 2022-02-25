<?php

use App\Restaurant;
use App\User;
use Illuminate\Database\Seeder;

class UpdateRestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $restaurants = Restaurant::all();
      foreach($restaurants as $singRest) {
          $user = User::inRandomOrder()->first()->id;
          $singRest->user_id = $user;
          $singRest->update();
        }
    }
}
