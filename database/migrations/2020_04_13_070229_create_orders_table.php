<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
   
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->string('chocolateName');
            // $table->unsignedBigInteger('quantity');
            // $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('totalAmount');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('shipped');
            $table->timestamps();
            // $table->index('userId');
        });
    }
   
 // $table->foreign('chocolateId')->references('id')->on('chocolates')->onDelete('cascade');

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
