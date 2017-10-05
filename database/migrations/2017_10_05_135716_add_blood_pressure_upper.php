<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBloodPressureUpper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_pressure_measurements', function (Blueprint $table) {
            $table->double('pressure_upper', 5);
            $table->renameColumn('pressure', 'pressure_lower');
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
            $table->dropColumn('pressure_upper');
            $table->renameColumn('pressure_lower', 'pressure');
        });

    }
}
