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
            'Barbecue',
            'Brasiliano',
            'Cinese',
            'Comfort Food',
            'Fast food',
            'Frutti di mare',
            'Gelato',
            'Hamburger',
            'Italiano',
            'Kebab',
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
          ];

          foreach ($typologies as $tipology){
              $new_type = new Type();
              $new_type->name = $tipology;
              $new_type->img = 'http://127.0.0.1:8000/storage/uploads/img/types/'.$tipology.'.jpg' ;
              $new_type->description = $faker->paragraphs(3, true);
              $new_type->slug = Str::slug($new_type->name, '-');
              $new_type->save();
          }
          
    }
}
