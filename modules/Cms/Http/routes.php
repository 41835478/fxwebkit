
<?php

use Pingpong\Widget\WidgetFacade;

Route::get('asset', function() {
    return Config::get('cms.theme_folder');
});
Route::group(['prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function() {
    Route::get('/', 'CmsController@index');
   // Route::get('pages', ['as' => 'cms.pages', 'uses' => 'PagesController@getPages']);
    Route::get('pages', ['as' => 'cms.pages', 'uses' => 'PagesController@getPagesList']);
    //Route::controller('pages','PagesController', ['as' => 'cms.pages']);
    Route::get('menus', ['as' => 'cms.menus', 'uses' => 'MenusController@getMenusList']);
    Route::get('articles', ['as' => 'cms.articles', 'uses' => 'ArticlesController@articles']);

    Route::post('pages', 'PagesController@postPages');
    Route::post('menus', 'MenusController@postMenus');
    Route::post('articles', 'ArticlesController@articles_php');

    Route::post('upload', 'ArticlesController@upload_image');
    Route::get('file_browser', 'ArticlesController@file_browser');

    Route::get('get_module_options', 'ModulesListController@get_module_options');
});


//Route::get('website','Modules\Cms\Http\Controllers\CmsController@website');
//Route::get('cms_module','CmsModules\Blog\Http\Controllers\BlogController@index');

Route::get('/{page_name}', 'Modules\Cms\Http\Controllers\PagesController@render_page');




//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});

