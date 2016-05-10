<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('testcrud', 'Modules\Cms\Http\Controllers\forms\testcrudController');});
Route::get('testcrud/form', [
    'as' => 'testcrud.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\testcrudController@cms_create'
]);
Route::post('testcrud/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\testcrudController@cms_store'
]);