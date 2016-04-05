<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsMassMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_mass_mail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 255)->nullable();
            $table->text('mail');
            $table->char('language', 3)->nullable();
            $table->integer('last_user_id')->unsigned();
            $table->integer('last_mt4_user_id')->unsigned();
            $table->boolean('completed');
            $table->integer('group_id');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings_mass_mail');
    }
}
