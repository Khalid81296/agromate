<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('supplierID');
            $table->string('companyName')->nullable();
            $table->string('contactFName')->nullable();
            $table->string('contactLName')->nullable();
            $table->string('contactTitle')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('webSite')->nullable();
            $table->text('paymentMethods')->nullable();
            $table->text('discountType')->nullable();
            $table->text('discountRate')->nullable();
            $table->text('typeGoods')->nullable();
            $table->boolean('discountAvailable')->nullable();
            $table->boolean('currentOrder')->nullable();
            $table->string('customerID')->nullable();
            $table->string('logo')->nullable();
            $table->text('no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
