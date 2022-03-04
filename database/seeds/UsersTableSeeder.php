<?php
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   

        // for($i = 0; $i < 5; $i++) {
        //     $newUser = new User();
        //     $newUser->name = $faker->name();
        //     $newUser->surname = $faker->name();
        //     $newUser->email = $faker->email();
        //     $newUser->password = $faker->password();
        //     $newUser->date_of_birth =$faker->date();
        //     $newUser->save();
        //   }


            $newUser = new User();
            $newUser->name = 'Ugo';
            $newUser->surname = 'De Ughi';
            $newUser->email = 'ugo@deughi.it';
            $newUser->password = 'ugo_deughi';
            $newUser->date_of_birth = $faker->date();
            $newUser->save();
          
            
 
    }
}
