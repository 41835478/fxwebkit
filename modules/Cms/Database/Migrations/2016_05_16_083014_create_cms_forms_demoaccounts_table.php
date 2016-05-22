<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsDemoaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_demoaccounts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('Mobilenumber');
            $table->string('Country');
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
        Schema::drop('cms_forms_demoaccounts');
    }
}
