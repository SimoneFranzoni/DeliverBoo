<?php
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $commonUser = new User();
        $commonUser->name = 'Team';
        $commonUser->surname = 'Cinque';
        $commonUser->email = 'team5@boolean.it';
        $commonUser->password = Hash::make('12345678');
        $commonUser->date_of_birth =$faker->date();
        $commonUser->save();

        for($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->surname = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = $faker->password();
            $newUser->date_of_birth =$faker->date();
            $newUser->save();
          }


            // $newUser = new User();
            // $newUser->name = 'Ugo';
            // $newUser->surname = 'De Ughi';
            // $newUser->email = 'ugo@deughi.it';
            // $newUser->password = 'ugo_deughi';
            // $newUser->date_of_birth = $faker->date();
            // $newUser->save();
          
            
 
    }
}
