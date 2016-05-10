<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsHolidaySymbolsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tools_holiday_symbols');

        Schema::create('tools_holiday_symbols', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('holiday_id');
            $table->integer('securities_id');
            $table->integer('symbols_id');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->date('date');
            // $table->timestamps();
//            $table->foreign('holiday_id')
//                ->references('id')->on('tools_holiday')
//                ->onDelete('cascade');
//            $table->foreign('securities_id')
//                ->references('id')->on('tools_securities')
//                ->onDelete('cascade');
//            $table->foreign('symbols_id')
//                ->references('id')->on('tools_symbols')
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
        Schema::drop('tools_holiday_symbols');
    }

}
