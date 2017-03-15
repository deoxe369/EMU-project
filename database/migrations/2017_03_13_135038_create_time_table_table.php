<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('train_trip');
            $table->string('train_number');
            $table->string('class');
            $table->string('source_station');
            $table->time('departure_time');
            $table->string('destination_station');
            $table->time('arrival_time');
            $table->string('trip_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_table');
    }
}
