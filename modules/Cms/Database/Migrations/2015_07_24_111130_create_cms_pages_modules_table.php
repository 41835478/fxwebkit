<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPagesModulesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cms_pages_modules', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('module_id');
            $table->string('module_name');
            $table->integer('order');
            $table->integer('float');
            $table->integer('display');
            $table->string('position');

            $table->timestamps();

            $table->foreign('page_id')
                    ->references('id')->on('cms_pages')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cms_pages_modules');
    }

}
