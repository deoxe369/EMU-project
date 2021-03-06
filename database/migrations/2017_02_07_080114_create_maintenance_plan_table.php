<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('train_number');
            $table->string('depot');
            $table->integer('level');
            $table->date('in_date');
            $table->date('out_date')->nullable();
            $table->date('stay')->nullable();
            $table->string('checklist')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('mark')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance');
    }
}
