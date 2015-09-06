<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsCustomHtmlLanguagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_customHtml_languages', function(Blueprint $table)
        {
            $table->increments('id');
            
$table->integer('cms_customHtml_id');
$table->integer('cms_languages_id');
$table->string('title',255);
$table->text('body');
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
        Schema::drop('cms_customHtml_languages');
    }

}
