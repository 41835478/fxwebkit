<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('nickname', 50);
            $table->string('location', 100);
            $table->date('birthday', 50);
            $table->string('phone', 14);
            $table->string('country', 2);
            $table->string('city', 50);
            $table->string('zip_code', 16);
            $table->boolean('gender');
            
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::drop('users_details');
    }
}
