<?php

use App\Restaurant;
use App\User;
use Illuminate\Database\Seeder;
use PhpOption\None;

class UpdateRestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    //Assegno User ID 1 a due ristoranti specifici
    {
        $ilGamberoRosso = Restaurant::where('name','Il Gambero Rosso')->first();
        $user = User::where('email','team5@boolean.it')->first()->id;
        $ilGamberoRosso->user_id = $user;
        $ilGamberoRosso->update();

        $laMuccaAssasina = Restaurant::where('name','La Mucca Assassina')->first();
        $user = User::where('email','team5@boolean.it')->first()->id;
        $laMuccaAssasina->user_id = $user;
        $laMuccaAssasina->update();

        
        $restaurants = Restaurant::all();
        foreach($restaurants as $singRest) {
          if(is_null($singRest->user_id)){
            $user = rand(2,4);
            $singRest->user_id = $user;
            $singRest->update();
          };
        };
        
    }
}
