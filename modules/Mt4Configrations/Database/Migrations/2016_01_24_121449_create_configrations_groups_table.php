<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsGroupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_groups', function(Blueprint $table)
        {
            $table->increments('id');

            $table->char('group',16);

            $table->integer('enable');
            $table->integer('timeout');
            $table->integer('otp_mode');


            $table->char('company',128);
            $table->char('signature',128);
            $table->char('support_page',128);
            $table->char('smtp_server',64);
            $table->char('smtp_login',32);
            $table->char('smtp_password',32);
            $table->char('support_email',64);
            $table->char('templates',32);

            $table->integer('copies');
            $table->integer('reports');

            $table->integer('default_leverage');
            $table->double('default_deposit');



            $table->integer('maxsecurities');


            $table->float('ConGroupSec');


            $table->float('ConGroupMargin');


            $table->integer('secmargins_total');


            $table->char('currency',12);


            $table->double('credit');


            $table->integer('margin_call');


            $table->integer('margin_mode');


            $table->integer('margin_stopout');


            $table->double('interestrate');


            $table->integer('use_swap');


            $table->integer('news');


            $table->integer('rights');


            $table->integer('check_ie_prices');


            $table->integer('maxpositions');


            $table->integer('close_reopen');


            $table->integer('hedge_prohibited');


            $table->integer('close_fifo');


            $table->integer('hedge_largeleg');


            $table->integer('unused_rights');
           // $table->integer('unused_rights',2);


            $table->char('securities_hash',16);


            $table->integer('margin_type');


            $table->integer('archive_period');


            $table->integer('archive_max_balance');



            $table->integer('stopout_skip_hedged');


            $table->integer('archive_pending_period');


            $table->integer('news_languages');
   //UINT              news_languages[8];           // LANGID array

            $table->integer('news_languages_total');
   //UINT              news_languages_total;        // news languages total


            $table->integer('reserved');
           // $table->integer('reserved',17);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configrations_groups');
    }

}
