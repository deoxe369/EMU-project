<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_schedule', function (Blueprint $table) {
             $table->increments('id');
            $table->string('train_trip');
            $table->string('train_number');
            $table->string('class');
            $table->string('source_station');
            $table->time('departure_time');
            $table->string('destination_station');
            $table->time('arrival_time');
            $table->string('trip_type');
            $table->string('reverse_trip');
            $table->string('mark')->nullable();
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
        Schema::dropIfExists('train_schedule');
    }
}
