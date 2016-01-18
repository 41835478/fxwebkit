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
