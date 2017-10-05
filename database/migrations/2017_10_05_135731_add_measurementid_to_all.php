<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeasurementidToAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_pressure_measurements', function (Blueprint $table) {
            $table->integer('measurementid')->required();
        });
        Schema::table('pulse_measurements', function (Blueprint $table) {
            $table->integer('measurementid')->required();
        });
        Schema::table('ECG_waves_measurements', function (Blueprint $table) {
            $table->integer('measurementid')->required();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_pressure_measurements', function (Blueprint $table) {
            $table->dropColumn('measurementid');
        });
        Schema::table('pulse_measurements', function (Blueprint $table) {
            $table->dropColumn('measurementid');
        });
        Schema::table('ECG_waves_measurements', function (Blueprint $table) {
            $table->dropColumn('measurementid');
        });
    }
}
