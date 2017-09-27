<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 26-9-17
 * Time: 12:23
 */
use Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Migrations\Migration;
class UpdateUsersAndCreateHealthInsuranceCompaniesTable extends Migration
{
    public function up() {
        Schema::create('health_insurance_companies', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');

        });
        Schema::table('users', function(Blueprint $table){
            $table->integer('health_insurance_id')->unsigned()->nullable();
            $table->foreign('health_insurance_id')
                ->references('id')
                ->on('health_insurance_companies');

        });
    }

    public function down() {
        Schema::drop('health_insurance_companies');
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_health_insurance_id_foreign');
            $table->dropColumn('health_insurance_id');
        });
    }
}
