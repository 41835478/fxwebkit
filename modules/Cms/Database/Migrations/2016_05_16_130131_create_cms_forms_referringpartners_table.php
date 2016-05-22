<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsReferringpartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_referringpartners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('mobile');
            $table->string('email');
            $table->string('countryOfResidence');
            $table->string('countryOfTargetBroker');
            $table->text('message');
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
        Schema::drop('cms_forms_referringpartners');
    }
}
