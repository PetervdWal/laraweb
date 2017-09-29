<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 29-9-17
 * Time: 19:11
 */
use  \Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class AddUserNumber extends Migration {

    public function up()
    {
        Schema::table("users", function (Blueprint $table) {

            $table->bigInteger('user_number')->unique();
        });
    }


    public function down() {
        Schema::table("users", function (Blueprint $table){
            $table->dropColumn("user_number");
        });
    }
}

