<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPagesContentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        /*  Schema::create('cms_pages_contents', function(Blueprint $table)
          {
          $table->increments('id');
          $table->integer('page_id');
          $table->integer('content_id');
          $table->timestamps();
          });
          } */
        Schema::create('cms_pages_contents', function(Blueprint $table) {
            $table->increments('id');
            $table->string("module_id",255)->nullable(); //
            $table->integer('type');
            $table->integer('page_id');
            $table->string('module_name')->nullable();
            $table->integer('order'); //order in the position 
            $table->integer('float'); //to let the module or content go right or left  but here we have to get care when we build the theme (main template ) and use clear:both property in css 
            $table->integer('display'); //inline or block ; to let the content in seprit line
            $table->string('position'); //we save name of position which will be in id of container in .blade.php file
            $table->boolean('all_pages'); //if true it will be in all pages and this condition wil has the first priorty  
  $table->timestamps();
      
//            $table->string('pages'); //we will save allowed pages -1-3-  and search with 'like' condition 
//            $table->string('except'); //we will save except pages -5-20-  and search with 'like' condition 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cms_pages_contents');
    }

}
