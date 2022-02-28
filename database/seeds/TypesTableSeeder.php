<?php

use App\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $typologies = [
            'Americano',
            'Asiatico',
            'Ali di pollo',
            'Barbecue',
            'Brasiliano',
            'Burger King',
            'Caffè',
            'Cinese',
            'Colazione',
            'Comfort Food',
            'Crèpe',
            'Curry',
            'Fast food',
            'Frappè',
            'Frutti di mare',
            'Gelato',
            'Giapponese',
            'Hamburger',
            'Indiano',
            'Italiano',
            'Kebab',
            'McDonalds',
            'Mediterraneo',
            'Messicano',
            'Pasta',
            'Piadina',
            'Pizza',
            'Poke',
            'Pollo',
            'Sandwich',
            'Spuntini',
            'Sushi',
            'Turco',
          ];

          foreach ($typologies as $tipology){
              $new_type = new Type();
              $new_type->name = $tipology;
              $new_type->description = $faker->paragraphs(3, true);
              $new_type->slug = Str::slug($new_type->name, '-');
              $new_type->save();
          }
          
    }
}
