<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsCareercentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_careercenters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('jobApplyingFor');
            $table->string('Email');
            $table->string('CurrentBasicSalary');
            $table->string('CoverLetter');
            $table->string('eligible');
            $table->string('cv');
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
        Schema::drop('cms_forms_careercenters');
    }
}
