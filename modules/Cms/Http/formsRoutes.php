<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('posts', 'Modules\Cms\Http\Controllers\forms\postsController');});
Route::get('posts/form', [
    'as' => 'posts.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\postsController@cms_create'
]);
Route::post('posts/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\postsController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('pofffsts', 'Modules\Cms\Http\Controllers\forms\pofffstsController');});
Route::get('pofffsts/form', [
    'as' => 'pofffsts.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\pofffstsController@cms_create'
]);
Route::post('pofffsts/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\pofffstsController@cms_store'
]);