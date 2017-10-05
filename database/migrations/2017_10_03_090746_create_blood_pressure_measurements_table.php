<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodPressureMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_pressure_measurements', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('measurementid')->required();
            $table->double('pressure_upper');
            $table->double('pressure_lower', 5);
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
        Schema::drop('users');

    }
}
