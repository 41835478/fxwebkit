<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestWithdrawalTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_withdrawal', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('login');
            $table->tinyInteger('server_id');
            $table->double('amount');
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
        Schema::drop('request_withdrawal');
    }

}
