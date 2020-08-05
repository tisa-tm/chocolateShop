<?php

use Illuminate\Database\Seeder;
// use Database\Seeds\UsersTableSeeder;
// use Database\Seeds\ChocolatesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(ChocolatesTableSeeder::class);
    }
}
