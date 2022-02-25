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
        $user = User::inRandomOrder()->first()->id;
        $restaurants = Restaurant::all();
        foreach($restaurants as $singRest) {
          $singRest->user_id = $user;
        }
    }
}
