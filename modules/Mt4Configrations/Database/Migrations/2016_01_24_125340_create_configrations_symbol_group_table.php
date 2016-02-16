<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigrationsSymbolGroupTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations_symbol_group', function(Blueprint $table)
        {
            $table->increments('id');

            $table->tinyInteger('position');
            $table->char('name',16);
            $table->char('description',64);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configrations_symbol_group');
    }

}
