<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part_type_id');
            $table->date('manufactured_date');
            $table->date('expired_date');
            $table->string('brand');
            $table->float('total_distance');
            $table->time('total_time');
            $table->integer('maintainance_id');
            $table->integer('cars_id');
            $table->integer('price');
            $table->boolean('status');
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
        Schema::dropIfExists('part');
    }
}
