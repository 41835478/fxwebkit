
<?php

use Pingpong\Widget\WidgetFacade;

Route::group(['prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function() {
    
        Route::controller('pages','PagesController',['getPagesList'=>'cms.pagesList']);
        Route::controller('menus','MenusController',['getMenusList'=>'cms.menusList']);
        Route::controller('articles','ArticlesController',['getArticlesList'=>'cms.articlesList']);
        Route::controller('customHtml','CustomHtmlController',['getCustomHtmlList'=>'cms.customHtmlList']);

        Route::controller('modules', 'ModulesListController');
});

Route::get('/{page_name}', 'Modules\Cms\Http\Controllers\PagesController@getRenderPage');




//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});

