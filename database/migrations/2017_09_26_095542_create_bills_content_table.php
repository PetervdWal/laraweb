<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_content', function (Blueprint $table) {
            $table->increments('id')->required;
            $table->integer('bill_id')->required;
            $table->char('treatment_code')->required;
            $table->char('treatment_description');
            $table->double('total_price')->required;
            $table->double('user_price');
            $table->boolean('user_paid');
            $table->double('insurance_price');
            $table->boolean('insurance_paid');
            $table->dateTime('treatment_given_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills_content');
    }
}
