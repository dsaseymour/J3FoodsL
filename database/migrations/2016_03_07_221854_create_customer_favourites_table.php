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
            $table->integer('customer_id')->unsigned()->primary();
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

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
