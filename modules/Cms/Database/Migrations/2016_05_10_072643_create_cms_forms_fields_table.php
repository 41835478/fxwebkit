<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsFormsFieldsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_fields', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cms_forms_id')->unsigned();
            $table->string('name',255);
            $table->string('type',255);
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
        Schema::drop('cms_forms_fields');
    }

}
