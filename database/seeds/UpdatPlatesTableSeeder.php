<?php


use App\Plate;
use App\Restaurant;
use Illuminate\Database\Seeder;

class UpdatPlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $gamberoRosso = Restaurant::where('id','1')->first();
      $counter = 0;
      while ($counter <= 2) {
        $randPlate = Plate::inRandomOrder()->first();
        if(is_null($randPlate->user_id)){
          $counter++;
          $randPlate->restaurant_id = $gamberoRosso->id;
          $randPlate->update();
        }
      }

      $muccaAssassina = Restaurant::where('id','2')->first();
      $counter = 0;
      while ($counter <= 2) {
        $randPlate = Plate::inRandomOrder()->first();
        if(is_null($randPlate->user_id)){
          $counter++;
          $randPlate->restaurant_id = $muccaAssassina->id;
          $randPlate->update();
        }
      }
      
      
        
        $plates = Plate::all();
        foreach($plates as $singlePlate) {
          if(is_null($singlePlate->restaurant_id)){
            $data = [
              'restaurant_id' => Restaurant::inRandomOrder()->first()->id
            ];
            $singlePlate->update($data);
          }
        }
    }
}
