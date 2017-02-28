<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_set', function (Blueprint $table) {
            $table->increments('id');
            $table->string('train_number')->nullable()->unique();
            // $table->integer('cars_id');
            $table->string('type');
            $table->float('total_distance')->default(0);
            $table->float('total_time')->default(0);
            $table->string('status')->default('ว่าง');
            $table->string('location_name')->nullable();
            $table->integer('location')->nullable();
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
        Schema::dropIfExists('train_set');
    }
}

