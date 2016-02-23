<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbportalPlanAliasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::dropIfExists('ibportal_plan_aliases');
        Schema::create('ibportal_plan_aliases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('plan_id');
            $table->integer('alias_id');
            $table->string('type',15);
            $table->double('value');

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
        Schema::drop('ibportal_plan_aliases');
    }

}
