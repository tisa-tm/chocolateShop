<?php

use Illuminate\Database\Seeder;
use App\Chocolate;

Class ChocolatesTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('chocolates')->delete();
  
        Chocolate::create(array(
            'name' => 'Mocha',
            'quantity' => '100',
            'price' => '100', 
            'type' => 'Milk Chocolate',
            'image' => 'milkChocolate.jpg',
        ));


        Chocolate::create(array(
            'name' => 'Hazel',
            'quantity' => '100',
            'price' => '100', 
            'type' => 'Milk Chocolate',
            'image' => 'milkChocolate.jpg',
        ));


        Chocolate::create(array(
            'name' => 'Dairy Milk',
            'quantity' => '100',
            'price' => '100', 
            'type' => 'Milk Chocolate',
            'image' => 'milkChocolate.jpg',
        ));

        Chocolate::create(array(
            'name'=> 'Obsidian',
            'quantity'=> '200',
            'price'=> '30', 
            'type'=> 'Dark Chocolate',
            'image' => 'darkChocolate.jpg',
        ));
        
        Chocolate::create(array(
            'name'=> 'Coffee',
            'quantity'=> '200',
            'price'=> '30', 
            'type'=> 'Dark Chocolate',
            'image' => 'darkChocolate.jpg',
        ));

        Chocolate::create(array(
            'name'=> 'Cocoa',
            'quantity'=> '200',
            'price'=> '30', 
            'type'=> 'Dark Chocolate',
            'image' => 'darkChocolate.jpg',
        ));

        Chocolate::create(array(
            'name'=> 'Snow',
            'quantity'=> '300',
            'price'=> '25', 
            'type'=> 'White Chocolate',
            'image' => 'whiteChocolate.jpg',
        ));

        Chocolate::create(array(
            'name'=> 'Pearl',
            'quantity'=> '300',
            'price'=> '25', 
            'type'=> 'White Chocolate',
            'image' => 'whiteChocolate.jpg',
        ));
        
        Chocolate::create(array(
            'name'=> 'Cream',
            'quantity'=> '300',
            'price'=> '25', 
            'type'=> 'White Chocolate',
            'image' => 'whiteChocolate.jpg',
        ));
        
    }
 
}