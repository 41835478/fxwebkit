<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbportalUserIbidTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ibportal_user_ibid');
        Schema::create('ibportal_user_ibid', function(Blueprint $table)
        {
            $table->increments('user_id');
            $table->text('user_ibid',255);

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
        Schema::drop('ibportal_user_ibid');
    }

}
