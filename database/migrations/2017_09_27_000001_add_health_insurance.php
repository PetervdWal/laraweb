<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 27-9-2017
 * Time: 14:47
 */

use  \Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;
class AddHealthInsurance extends Migration
{
    public function up() {
        Schema::table('users', function(Blueprint $table) {
           $table->mediumInteger('policy_number');
           $table->string('insurance_type');
           $table->date('insurance_start');
           $table->date('insurance_end');
           $table->double('excess');
        });
    }

    public function down() {
        Schema::table('users', function(Blueprint $table){
           $table->removeColumn('policy_number');
           $table->removeColumn('insurance_type');
           $table->removeColumn('insurance_start');
            $table->removeColumn('insurance_end');
            $table->removeColumn('excess');
        });
    }
}