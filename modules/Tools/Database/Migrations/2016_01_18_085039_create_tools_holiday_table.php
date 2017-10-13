<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsHolidayTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::dropIfExists('tools_holiday');
        Schema::create('tools_holiday', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name', 50);
            $table->date('start_date');
            $table->date('end_date');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tools_holiday');
    }

}
