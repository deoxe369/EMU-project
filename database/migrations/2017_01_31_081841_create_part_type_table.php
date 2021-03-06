<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_type')->unique();
            $table->integer('lifetime_time')->nullable(); //year
            $table->integer('lifetime_distance')->nullable();//km
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
        Schema::dropIfExists('part_type');
    }
}

