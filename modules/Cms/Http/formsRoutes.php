<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('testcrud', 'Modules\Cms\Http\Controllers\forms\testcrudController');});
Route::get('testcrud/form', [
    'as' => 'testcrud.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\testcrudController@cms_create'
]);
Route::post('testcrud/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\testcrudController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('firstformsdfsdfsdf', 'Modules\Cms\Http\Controllers\forms\firstformsdfsdfsdfController');});
Route::get('firstformsdfsdfsdf/form', [
    'as' => 'firstformsdfsdfsdf.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\firstformsdfsdfsdfController@cms_create'
]);
Route::post('firstformsdfsdfsdf/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\firstformsdfsdfsdfController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ffff', 'Modules\Cms\Http\Controllers\forms\ffffController');});
Route::get('ffff/form', [
    'as' => 'ffff.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_create'
]);
Route::post('ffff/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ffff', 'Modules\Cms\Http\Controllers\forms\ffffController');});
Route::get('ffff/form', [
    'as' => 'ffff.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_create'
]);
Route::post('ffff/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ffff', 'Modules\Cms\Http\Controllers\forms\ffffController');});
Route::get('ffff/form', [
    'as' => 'ffff.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_create'
]);
Route::post('ffff/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ffffController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('sdfsdf', 'Modules\Cms\Http\Controllers\forms\sdfsdfController');});
Route::get('sdfsdf/form', [
    'as' => 'sdfsdf.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\sdfsdfController@cms_create'
]);
Route::post('sdfsdf/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\sdfsdfController@cms_store'
]);