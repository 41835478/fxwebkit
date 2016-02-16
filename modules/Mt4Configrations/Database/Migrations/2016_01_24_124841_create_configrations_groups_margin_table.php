<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsGroupsMarginTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_groups_margin', function(Blueprint $table)
        {
            $table->increments('id');

            $table->tinyInteger('position');
            $table->char('symbol',12);


            $table->double('swap_long');
            $table->double('swap_short');

            $table->double('margin_divider');

            $table->integer('reserved');
           // $table->integer('reserved',7);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configrations_groups_margin');
    }

}
