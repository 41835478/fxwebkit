
<?php

use Pingpong\Widget\WidgetFacade;

Route::get('set-language', [
    'uses' => 'modules\Cms\Http\Controllers\LanguagesController@getSetLanguage'
        ,'as'=>'cms.setLanguage'
]);

Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function() {
    
        Route::controller('pages','PagesController',['getPagesList'=>'cms.pagesList']);
        Route::controller('menus','MenusController',['getMenusList'=>'cms.menusList']);
        Route::controller('articles','ArticlesController',['getArticlesList'=>'cms.articlesList']);
        Route::controller('forms','FormsController',['getFormsList'=>'cms.formsList']);
        Route::controller('customHtml','CustomHtmlController',['getCustomHtmlList'=>'cms.customHtmlList']);
        Route::controller('themes','ThemesController',['getThemesList'=>'cms.themesList']);
        Route::controller('languages','LanguagesController',['getLanguagesList'=>'cms.languagesList']);
        Route::controller('settings','CmsController',['getCmsSettings'=>'cms.cmsSettings']);
        Route::controller('modules', 'ModulesListController');
});

Route::post('upload-file', [
    'uses' => 'modules\Cms\Http\Controllers\FormsController@postUploadImage'
    ,'as'=>'uploadFile'
]);


include 'formsRoutes.php';
//Route::get('/{page_name}', 'Modules\Cms\Http\Controllers\PagesController@getRenderPage');




//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});

