<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_ratings', function (Blueprint $table) {
            $table->integer('rating');
            $table->char('review', 200);
            $table->timestamps();
            $table->integer('customer_id')->unsigned();
            $table->integer('restaurant_id')->unsigned()->primary();
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
        Schema::drop('customer_ratings');
    }
}
