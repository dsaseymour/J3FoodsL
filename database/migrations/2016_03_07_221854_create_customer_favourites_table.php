<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_favourites', function (Blueprint $table) {
            $table->integer('quantity');
            $table->integer('item_Number');
            $table->timestamps();
            $table->foreign('cust_ID')->references('cust_ID')->on('customers');
            $table->foreign('rest_ID')->references('rest_ID')->on('restaurants');
            $table->integer('cust_ID')->unsigned()->primary();
            $table->integer('rest_ID')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_favourites');
    }
}
