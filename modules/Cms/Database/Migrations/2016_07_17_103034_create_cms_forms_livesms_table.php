<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsLivesmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_livesms', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('live_account_id');
            $table->string('secret');
            $table->string('phone');
            $table->string('message');
            $table->integer('status');
            $table->text('connection_info');
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
        Schema::drop('cms_forms_livesms');
    }
}
