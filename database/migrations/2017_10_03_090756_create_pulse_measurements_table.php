<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePulseMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulse_measurements', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('measurementid')->required();
            $table->double('pulse', 5);
            $table->dateTime('measurement_taken_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
