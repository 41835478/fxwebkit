<?php


Route::post('cms_forms_hhhh/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\cms_forms_hhhhController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_bbbbb', 'modules\Cms\Http\Controllers\forms\cms_forms_bbbbbController');});
Route::get('cms_forms_bbbbb/form', [
    'as' => 'cms_forms_bbbbb.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_bbbbbController@cms_create'
]);
Route::post('cms_forms_bbbbb/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_bbbbbController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('fffsdfds', 'modules\Cms\Http\Controllers\forms\fffsdfdsController');});
Route::get('fffsdfds/form', [
    'as' => 'fffsdfds.form', 'uses' => 'modules\Cms\Http\Controllers\forms\fffsdfdsController@cms_create'
]);
Route::post('fffsdfds/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\fffsdfdsController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ffff', 'modules\Cms\Http\Controllers\forms\ffffController');});
Route::get('ffff/form', [
    'as' => 'ffff.form', 'uses' => 'modules\Cms\Http\Controllers\forms\ffffController@cms_create'
]);
Route::post('ffff/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\ffffController@cms_store'
]);