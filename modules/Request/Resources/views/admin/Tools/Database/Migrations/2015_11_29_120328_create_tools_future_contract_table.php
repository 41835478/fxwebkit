<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsFutureContractTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_future_contract', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->char('symbol',16)->nullable();
            $table->string('exchange', 50)->nullable();
            $table->tinyInteger('month')->nullable();
            $table->integer('year');
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::drop('tools_future_contract');
    }

}
