<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('productId');
            $table->string('SKU')->nullable();
            $table->string('IDSKU')->nullable();
            $table->string('supplierProductID')->nullable();
            $table->string('productName')->nullable();
            $table->text('productDescription');
            $table->integer('supplierID')->nullable();
            $table->integer('categoryID')->nullable();
            $table->integer('quantityPerUnit')->nullable();
            $table->float('unitPrice')->nullable();
            $table->float('MSRP')->nullable();
            $table->decimal('discount')->nullable();
            $table->double('unitWeight')->nullable();
            $table->smallInteger('unitsInStock')->nullable();
            $table->smallInteger('unitsOnOrder')->nullable();
            $table->smallInteger('reorderLevel');
            $table->boolean('productAvailable');
            $table->boolean('discountAvailable');
            $table->boolean('currentOrder');
            $table->string('picture');
            $table->integer('ranking');
            $table->text('Note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
