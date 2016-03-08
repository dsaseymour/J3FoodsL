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
            $table->integer('rest_ID')->unsigned()->primary();
            $table->foreign('rest_ID')->references('rest_ID')->on('restaurants');

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
