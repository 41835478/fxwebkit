<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAddDemoAccountTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_add_demo_account', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->date('birthday', 50)->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip_code', 16)->nullable();
            $table->boolean('gender')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request_add_demo_account');
    }

}
