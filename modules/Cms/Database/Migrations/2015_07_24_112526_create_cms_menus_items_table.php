<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsMenusItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cms_menus_items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //the display name to click on
            $table->integer('parent_item_id'); //this field return to this table to deside the id of the parent menu item when we display the menu
            $table->integer('menu_id')->unsigned(); //the menu id from the menus table because we have more than one menu in our web site like a side menu or header menu
            $table->boolean('disable'); //if we need to make the menu item no click able or do no think when we click on it in the page but desplay the child menu items
            $table->boolean('hide'); //do not show me this menu item or it's childs item when you render the menu for now
            $table->integer('type'); //here we deside the type of the menu if it's go to page or to content (if it go to the content we will display page contain the require content 
            $table->integer('content_id'); //if the type =1 we have to select content from dropdown list 
            $table->integer('page_id'); //if the type =0 we have to select page from dropdown list 
            
            $table->foreign('menu_id')
                    ->references('id')->on('cms_menus')
                    ->onDelete('cascade');
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cms_menus_items');
    }

}
