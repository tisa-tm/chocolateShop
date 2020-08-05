<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->delete();
  
        User::create(array(
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'deliveryAddress' => 'mha',
            'contactNumber' => '123456789',
            'type' => 'admin',
        ));

        User::create(array(
            'name' => 'bakugo',
            'email' => 'bakugo@gmail.com',
            'password' => Hash::make('1'),
            'deliveryAddress' => 'mha',
            'contactNumber' => '1234567891',
        ));

        User::create(array(
            'name' => 'izuku',
            'email' => 'izuku@gmail.com',
            'password' => Hash::make('1'),
            'deliveryAddress' => 'mha',
            'contactNumber' => '1234567892',
        ));
	}
 
}
