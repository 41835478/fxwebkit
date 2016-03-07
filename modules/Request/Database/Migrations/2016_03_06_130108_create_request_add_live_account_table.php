<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAddLiveAccountTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_add_live_account', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 100);
            $table->string('investor', 100);
            $table->date('birthday', 50)->nullable();
            $table->integer('leverage');
            $table->integer('array_deposit');
            $table->integer('array_group');
            $table->string('phone', 14)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('zip_code', 16)->nullable();
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
        Schema::drop('request_add_live_account');
    }

}
