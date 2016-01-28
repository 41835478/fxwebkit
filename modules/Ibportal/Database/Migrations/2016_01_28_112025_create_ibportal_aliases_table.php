<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbportalAliasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::dropIfExists('ibportal_aliases');
        Schema::create('ibportal_aliases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('alias',100);
            $table->string('operand',100);
            $table->string('value',100);
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
        Schema::drop('ibportal_aliases');
    }

}
