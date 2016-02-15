<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsSessionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_sessions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('symbol', 12);
            $table->tinyInteger('quote_trade');
            $table->integer('open_hour');
            $table->integer('open_min');
            $table->integer('close_hour');
            $table->integer('close_min');
            $table->integer('open');
            $table->integer('close');
            $table->integer('align');
//            short             open_hour,open_min;          // session open  time: hour & minute
//   short             close_hour,close_min;        // session close time: hour & minute
//   int               open,close;                  // internal data
//   short             align[7];                    // internal data

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
        Schema::drop('configrations_sessions');
    }

}
