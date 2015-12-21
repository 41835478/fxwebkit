<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsMenusLanguagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_menus_languages', function(Blueprint $table)
        {
            $table->increments('id');
$table->integer('cms_menus_id')->unsigned();
$table->integer('cms_languages_id')->unsigned();
$table->text('translate');

            $table->foreign('cms_menus_id')
                    ->references('id')->on('cms_menus')
                    ->onDelete('cascade');
            
            $table->foreign('cms_languages_id')
                    ->references('id')->on('cms_languages')
                    ->onDelete('cascade');
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
        Schema::drop('cms_menus_languages');
    }

}
