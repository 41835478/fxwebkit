<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class LangugesController extends Controller {

    public function index() {
        
    }

    public function create_language_tables($language_prefix) {
        
        Schema::create('cms_' . $language_prefix . '_menus_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('name'); //the display name to click on
            $table->timestamps();
        });


        Schema::create('cms_' . $language_prefix . '_menus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('cms_' . $language_prefix . '_pages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('cms_' . $language_prefix . '_contents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
        
    }

}
