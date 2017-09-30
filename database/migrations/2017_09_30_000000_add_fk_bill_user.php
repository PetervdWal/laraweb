<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 30-9-2017
 * Time: 18:01
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class AddFkBillUser extends Migration {

    public function up(){
        Schema::table('bills_content', function(Blueprint $table) {
           $table->bigInteger('bill_reciever')->nullable();
           $table->foreign('bill_reciever')->references('user_number')->on('users');
        });
    }

    public function down(){
        Schema::table('bills_content', function(Blueprint $table) {
           $table->dropForeign("bill_reciever");
           $table->dropColumn("bill_reciever");
        });
    }
}