<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 26-9-17
 * Time: 12:23
 */
use Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Migrations\Migration;
class UpdateUsersTable extends Migration
{
    public function up() {
        Schema::table('users', function(Blueprint $table){
           $table->string('street');
           $table->integer('home_number');
           $table->bigInteger('bsn');
           $table->string('phone_number');
           $table->dateTime( 'date_of_birth');
        });
    }

    public function down() {
        Schema::table('users', function(Blueprint $table){
           $table->removeColumn('street');
           $table->removeColumn('home_number');
           $table->removeColumn('bsn');
           $table->removeColumn('phone_number');
           $table->removeColumn('date_of_birth=');
        });
    }
}
