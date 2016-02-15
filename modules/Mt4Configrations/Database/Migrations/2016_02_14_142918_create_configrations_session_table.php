<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsSessionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_session', function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('symbol',12);
            $table->json('quote');
            $table->json('trade');
            $table->integer('quote_overnight');
            $table->integer('trade_overnight');
            $table->integer('reserved');
//            //---
//            ConSession        quote[3];                    // quote sessions
//   ConSession        trade[3];                    // trade sessions
//   //---
//   int               quote_overnight;             // internal data
//   int               trade_overnight;             // internal data
//   int               reserved[2];                 // reserved
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
        Schema::drop('configrations_session');
    }

}
