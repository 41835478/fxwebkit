<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAssignAccountTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_assign_account', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('accountId');
            $table->string('name',100);
            $table->string('login',100);
            $table->tinyInteger('server_id');
            $table->string('password',100);
            $table->text('comment');
            $table->text('reason');
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
        Schema::drop('request_assign_account');
    }

}
