<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('orderDetailID');
            $table->integer('orderID');
            $table->integer('productID');
            $table->double('price');
            $table->smallInteger('quantity');
            $table->string('discount')->nullable();
            $table->integer('total');
            $table->boolean('fulfilled');
            $table->dateTime('billDate');
            $table->dateTime('shipDate');
            $table->integer('shipperID');
            $table->double('transportationCost');
            $table->double('salesTax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
