<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->char('day_ID', 4);
            $table->time('open_Time');
            $table->integer('interval_Open');
            $table->timestamps();
            $table->integer('restaurant_id')->unsigned()->primary();
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
        Schema::drop('hours');
    }
}
