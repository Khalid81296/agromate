<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orderID');
            $table->string('customerID');
            $table->integer('paymentID');
            $table->dateTime('orderDate');
            $table->dateTime('shipDate');
            $table->string('shipperID')->nullable();
            $table->string('transportationCost');
            $table->string('salesTax');
            $table->dateTime('paymentDate');
            $table->string('paid')->nullable();
            $table->integer('status');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
