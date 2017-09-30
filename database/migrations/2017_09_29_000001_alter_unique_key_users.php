<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 29-9-17
 * Time: 19:11
 */
use  \Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class AlterUniqueKeyUsers extends Migration {

    public function up()
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropIndex('users_email_unique');

        });
    }


    public function down() {
        Schema::table("users", function (Blueprint $table){
            $table->string('email')->unique()->change();
        });
    }
}
