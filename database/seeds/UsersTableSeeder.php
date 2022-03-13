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


        $commonUser = new User();
        $commonUser->name = 'Team';
        $commonUser->surname = 'quatro';
        $commonUser->email = 'team4@boolean.it';
        $commonUser->password = Hash::make('4567890?');
        $commonUser->date_of_birth =$faker->date();
        $commonUser->save();

        $commonUser = new User();
        $commonUser->name = 'Team3';
        $commonUser->surname = 'tre';
        $commonUser->email = 'team3@boolean.it';
        $commonUser->password = Hash::make('34567890');
        $commonUser->date_of_birth =$faker->date();
        $commonUser->save();

        $commonUser = new User();
        $commonUser->name = 'Team';
        $commonUser->surname = 'due';
        $commonUser->email = 'team2@boolean.it';
        $commonUser->password = Hash::make('23456789');
        $commonUser->date_of_birth =$faker->date();
        $commonUser->save();
    }
}
