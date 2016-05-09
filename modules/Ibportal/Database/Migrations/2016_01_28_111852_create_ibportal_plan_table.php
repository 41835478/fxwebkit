<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbportalPlanTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::dropIfExists('ibportal_plan');
        Schema::create('ibportal_plan', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',100);
            $table->tinyInteger('public');
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
        Schema::drop('ibportal_plan');
    }

}
