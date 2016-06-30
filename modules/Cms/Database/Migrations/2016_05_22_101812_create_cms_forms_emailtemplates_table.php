<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsEmailtemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_emailtemplates', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('admin_email');
            $table->text('template');
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
        Schema::drop('cms_forms_emailtemplates');
    }
}
