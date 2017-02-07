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
            $table->string('type');
            $table->float('total_distance')->default(0);
            $table->float('total_time')->default(0);
            $table->string('status')->default('ว่าง');
            $table->string('train_set_number');
            $table->timestamps();
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

