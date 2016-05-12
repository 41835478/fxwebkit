<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('posts', 'Modules\Cms\Http\Controllers\forms\postsController');});
Route::get('posts/form', [
    'as' => 'posts.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\postsController@cms_create'
]);
Route::post('posts/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\postsController@cms_store'
]);