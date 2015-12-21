<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPagesContentsPagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages_contents_pages', function(Blueprint $table)
        {
            $table->integer('pages_id')->unsigned();
            $table->integer('pages_contents_id')->unsigned();

            $table->foreign('pages_id')
                    ->references('id')->on('cms_pages')
                    ->onDelete('cascade');
            
            $table->foreign('pages_contents_id')
                    ->references('id')->on('cms_pages_contents')
                    ->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_pages_contents_pages');
    }

}
