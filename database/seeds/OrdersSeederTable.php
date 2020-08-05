<?php

use Illuminate\Database\Seeder;

class OrdersSeederTable extends Seeder
{
   
    public function run()
    {
         DB::table('orders')->delete();
  
        Chocolate::create(array(
          'chocolateName' => ,
          'quantity' => ,
          'price' => ,
          'amount' => ,
          'chocolateId' => ,
          'userId' => ,
        ));

    }
}
