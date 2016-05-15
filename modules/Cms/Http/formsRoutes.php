<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_ttt', 'modules\Cms\Http\Controllers\forms\cms_forms_tttController');});
Route::get('cms_forms_ttt/form', [
    'as' => 'cms_forms_ttt.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_tttController@cms_create'
]);
Route::post('cms_forms_ttt/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_tttController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');});
Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');});
Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_sdfs', 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController');});
Route::get('cms_forms_sdfs/form', [
    'as' => 'cms_forms_sdfs.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController@cms_create'
]);
Route::post('cms_forms_sdfs/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController@cms_store'
]);