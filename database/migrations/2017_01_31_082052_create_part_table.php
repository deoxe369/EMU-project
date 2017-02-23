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
            $table->string('part_type');
            $table->date('manufactured_date');
            $table->date('expired_date');
            $table->string('brand');
            $table->float('total_distance')->default(0);
            $table->float('total_time')->default(0);
            $table->integer('maintainance_id')->default(0);
            $table->integer('cars_id')->default(0);
            $table->decimal('price',15,2);
            $table->string('status')->default('ใช้ได้');
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
        Schema::dropIfExists('part');
    }
}
