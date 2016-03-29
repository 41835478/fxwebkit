<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsGroupSecTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_group_sec', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('show');
            $table->integer('trade');
            $table->double('comm_base');
            $table->integer('comm_type');
            $table->integer('comm_lots');
            $table->double('comm_agent');
            $table->integer('comm_agent_type');
            $table->integer('spread_diff');
            $table->integer('lot_min');
            $table->integer('lot_max');
            $table->integer('lot_step');
            $table->integer('ie_deviation');
            $table->integer('confirmation');
            $table->integer('trade_rights');
            $table->integer('ie_quick_mode');
            $table->integer('autocloseout_mode');
            $table->double('comm_tax');
            $table->integer('comm_agent_lots');
            $table->integer('freemargin_mode');
            $table->integer('reserved');

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
        Schema::drop('configrations_group_sec');
    }

}
