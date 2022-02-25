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
        $plates = Plate::all();
        foreach($plates as $singlePlate) {
          $data = [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id
          ];
          $singlePlate->update($data);
        }
    }
}
