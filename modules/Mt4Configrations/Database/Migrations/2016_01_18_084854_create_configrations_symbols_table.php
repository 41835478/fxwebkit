<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsSymbolsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tools_symbols');
        Schema::create('tools_symbols', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('securities_id');


            $table->char('symbol', 12);
            $table->char('description', 64);
            $table->char('source', 12);
            $table->char('currency', 12);

            $table->integer('type');
            $table->integer('digits');
            $table->integer('trade');


   //--- external settings
   COLORREF          background_color;            // background color
   int               count;                       // symbols index
   int               count_original;              // symbols index in market watch
   int               external_unused[7];
   //--- sessions
   int               realtime;                    // allow real time quotes
   time_t            starting;                    // trades starting date (UNIX time)
   time_t            expiration;                  // trades end date      (UNIX time)
   ConSessions       sessions[7];                 // quote & trade sessions
   //--- profits
   int               profit_mode;                 // profit calculation mode
   int               profit_reserved;             // reserved
   //--- filtration
   int               filter;                      // filter value
   int               filter_counter;              // filtration parameter
   double            filter_limit;                // max. permissible deviation from last quote (percents)
   int               filter_smoothing;            // smoothing
   float             filter_reserved;             // reserved
   int               logging;                     // enable to log quotes
   //--- spread & swaps
   int               spread;                      // spread
   int               spread_balance;              // spread balance
   int               exemode;                     // execution mode
   int               swap_enable;                 // enable swaps
   int               swap_type;                   // swap type
   double            swap_long,swap_short;        // swaps values for long & short postions
   int               swap_rollover3days;          // triple rollover day-0-Monday,1-Tuesday...4-Friday
   double            contract_size;               // contract size
   double            tick_value;                  // one tick value
   double            tick_size;                   // one tick size
   int               stops_level;                 // stops deviation value
   int               gtc_pendings;                // GTC mode ORDERS_DAILY, ORDERS_GTC, ORDERS_DAILY_NO_STOPS
   //--- margin calculation
   int               margin_mode;                 // margin calculation mode
   double            margin_initial;              // initial margin
   double            margin_maintenance;          // margin maintenance
   double            margin_hedged;               // hedged margin
   double            margin_divider;              // margin divider
   //--- calclulated variables (internal data)
   double            point;                       // point size-(1/(10^digits)
   double            multiply;                    // multiply 10^digits
   double            bid_tickvalue;               // tickvalue for bid
   double            ask_tickvalue;               // tickvalue for ask
   //---
   int               long_only;                   // allow only BUY positions
   int               instant_max_volume;          // max. volume for Instant Execution
   //---
   char              margin_currency[12];         // currency of margin requirments
   int               freeze_level;                // modification freeze level (from market price)
   int               margin_hedged_strong;        // lock open checking mode
   time_t            value_date;                  // value date for this security
   int               quotes_delay;                // quotes delay
   int               swap_openprice;         	  // use open price at swaps calculation in SWAP_BY_INTEREST mode
   int               swap_variation_margin;       // charge variation margin on rollover
   //---
   int               unused[21];             	  // reserved


//            $table->foreign('securities_id')
//                ->references('id')->on('tools_securities')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tools_symbols');
    }

}
