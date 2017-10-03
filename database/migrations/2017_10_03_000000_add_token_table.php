<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 3-10-2017
 * Time: 20:53
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class AddTokenTable extends Migration {

    public function up(){
        Schema::create("tokens", function(Blueprint $table){
            $table->increments("id");
            $table->bigInteger("user_number");
            $table->foreign("user_number")
                ->references('user_number')->on('users')
                ->onDelete('cascade');
            $table->string('token', 60)->unique();
            $table->timestamp('created_at');
        });
    }

    public function down() {
        Schema::table("tokens", function(Blueprint $table){
           $table->dropForeign("user_number");
           $table->dropUnique("token");
        });
        Schema::drop("tokens");
    }
}