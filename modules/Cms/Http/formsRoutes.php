<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('gggg', 'Modules\Cms\Http\Controllers\forms\ggggController');});
Route::get('gggg/form', [
    'as' => 'gggg.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ggggController@cms_create'
]);
Route::post('gggg/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ggggController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ggggvvvvvvvv', 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController');});
Route::get('ggggvvvvvvvv/form', [
    'as' => 'ggggvvvvvvvv.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController@cms_create'
]);
Route::post('ggggvvvvvvvv/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ggggvvvvvvvv', 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController');});
Route::get('ggggvvvvvvvv/form', [
    'as' => 'ggggvvvvvvvv.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController@cms_create'
]);
Route::post('ggggvvvvvvvv/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ggggvvvvvvvvController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('aaaaaa', 'Modules\Cms\Http\Controllers\forms\aaaaaaController');});
Route::get('aaaaaa/form', [
    'as' => 'aaaaaa.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\aaaaaaController@cms_create'
]);
Route::post('aaaaaa/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\aaaaaaController@cms_store'
]);