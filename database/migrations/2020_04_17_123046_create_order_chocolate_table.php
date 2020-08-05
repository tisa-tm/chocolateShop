<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderChocolateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderDetails', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('chocolateId');
            $table->foreign('chocolateId')->references('id')->on('chocolates')->onDelete('cascade');

            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('amount')->storedAs('quantity*price');
            // $table->string('name');
            // $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderDetails');
    }
}
