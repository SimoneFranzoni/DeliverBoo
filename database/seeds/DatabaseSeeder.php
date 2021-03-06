<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(UpdateRestaurantsTableSeeder::class);
        $this->call(PlatesTableSeeder::class);
        $this->call(UpdatPlatesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(RestaurantsTypesTableSeeder::class);
        // $this->call(OrdersTableSeeder::class);
        // $this->call(OrdersPlatesSeeder::class);
        // $this->call(UpdateOrdersTableSeeder::class);

    }
}
