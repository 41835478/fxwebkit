<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsSymbolsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_symbols', function(Blueprint $table)
        {
            $table->increments('id');
       //     $table->string('name',50);
            $table->integer('securities_id');


            $table->char('symbol', 12);
            $table->char('description', 64);
            $table->char('source', 12);
            $table->char('currency', 12);

            $table->integer('type');
            $table->integer('digits');
            $table->integer('trade');


            $table->char('background_color', 6);
            $table->integer('count');
            $table->integer('count_original');
            $table->integer('external_unused');
           // $table->integer('external_unused', 7);

            $table->integer('realtime');
            $table->timestamp('starting');
            $table->timestamp('expiration');
        //    $table->string('sessions',7);



            $table->integer('profit_mode');
            $table->integer('profit_reserved');

            $table->integer('filter');
            $table->integer('filter_counter');

            $table->double('filter_limit');


            $table->integer('filter_smoothing');
            $table->float('filter_reserved');
            $table->integer('logging');


            $table->integer('spread');
            $table->integer('spread_balance');
            $table->integer('exemode');
            $table->integer('swap_enable');
            $table->integer('swap_type');


            $table->double('swap_long');
            $table->double('swap_short');


            $table->integer('swap_rollover3days');


            $table->double('contract_size');
            $table->double('tick_value');
            $table->double('tick_size');


            $table->integer('stops_level');
            $table->integer('gtc_pendings');


            $table->integer('margin_mode');
            $table->double('margin_initial');
            $table->double('margin_maintenance');
            $table->double('margin_hedged');
            $table->double('margin_divider');

            $table->double('point');
            $table->double('multiply');
            $table->double('bid_tickvalue');
            $table->double('ask_tickvalue');



            $table->integer('long_only');
            $table->integer('instant_max_volume');

            $table->char('margin_currency', 12);


            $table->integer('freeze_level');
            $table->integer('margin_hedged_strong');
            $table->timestamp('value_date');
            $table->integer('quotes_delay');
            $table->integer('swap_openprice');
            $table->integer('swap_variation_margin');
       //     $table->integer('unused');
           // $table->integer('unused',21);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configrations_symbols');
    }

}
