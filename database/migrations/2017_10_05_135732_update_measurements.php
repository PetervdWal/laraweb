<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5-10-17
 * Time: 21:40
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMeasurements extends Migration {

    public function up(){
        Schema::create("measurements", function(Blueprint $table){
           $table->increments("id");
           $table->string("name");
           $table->string("created_at");
           $table->string("type");
           $table->integer("user_number");

        });

        Schema::table("pulse_measurements", function(Blueprint $table){
            $table->integer("measurementid")
                ->unsigned()
                ->nullable()->change();

        });
        Schema::table("ECG_waves_measurements", function(Blueprint $table){
            $table->integer("measurementid")
                ->unsigned()
                ->nullable()
                ->change();

        });
        Schema::table("blood_pressure_measurements", function(Blueprint $table){
            $table->integer("measurementid")
                ->unsigned()
                ->nullable()
                ->change();

        });
    }

    public function drop(){
        Schema::drop("measurements");
    }

}