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
            $table->foreign('cust_ID')->references('cust_ID')->on('customers');
            $table->foreign('rest_ID')->references('rest_ID')->on('restaurants');
            $table->integer('cust_ID')->unsigned();
            $table->integer('rest_ID')->unsigned()->primary();

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
