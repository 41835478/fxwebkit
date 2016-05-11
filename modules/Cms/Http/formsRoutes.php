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
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('tefdgsd', 'Modules\Cms\Http\Controllers\forms\tefdgsdController');});
Route::get('tefdgsd/form', [
    'as' => 'tefdgsd.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\tefdgsdController@cms_create'
]);
Route::post('tefdgsd/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\tefdgsdController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('tesdt', 'Modules\Cms\Http\Controllers\forms\tesdtController');});
Route::get('tesdt/form', [
    'as' => 'tesdt.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\tesdtController@cms_create'
]);
Route::post('tesdt/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\tesdtController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('sdfgsdfg', 'Modules\Cms\Http\Controllers\forms\sdfgsdfgController');});
Route::get('sdfgsdfg/form', [
    'as' => 'sdfgsdfg.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\sdfgsdfgController@cms_create'
]);
Route::post('sdfgsdfg/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\sdfgsdfgController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('defg', 'Modules\Cms\Http\Controllers\forms\defgController');});
Route::get('defg/form', [
    'as' => 'defg.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\defgController@cms_create'
]);
Route::post('defg/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\defgController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('formff', 'Modules\Cms\Http\Controllers\forms\formffController');});
Route::get('formff/form', [
    'as' => 'formff.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\formffController@cms_create'
]);
Route::post('formff/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\formffController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('testdelete', 'Modules\Cms\Http\Controllers\forms\testdeleteController');});
Route::get('testdelete/form', [
    'as' => 'testdelete.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\testdeleteController@cms_create'
]);
Route::post('testdelete/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\testdeleteController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('ffffffffffffffffff', 'Modules\Cms\Http\Controllers\forms\ffffffffffffffffffController');});
Route::get('ffffffffffffffffff/form', [
    'as' => 'ffffffffffffffffff.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\ffffffffffffffffffController@cms_create'
]);
Route::post('ffffffffffffffffff/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\ffffffffffffffffffController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('dfgd', 'Modules\Cms\Http\Controllers\forms\dfgdController');});
Route::get('dfgd/form', [
    'as' => 'dfgd.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\dfgdController@cms_create'
]);
Route::post('dfgd/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\dfgdController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('test', 'Modules\Cms\Http\Controllers\forms\testController');});
Route::get('test/form', [
    'as' => 'test.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\testController@cms_create'
]);
Route::post('test/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\testController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('test', 'Modules\Cms\Http\Controllers\forms\testController');});
Route::get('test/form', [
    'as' => 'test.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\testController@cms_create'
]);
Route::post('test/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\testController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('dfgdg', 'Modules\Cms\Http\Controllers\forms\dfgdgController');});
Route::get('dfgdg/form', [
    'as' => 'dfgdg.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\dfgdgController@cms_create'
]);
Route::post('dfgdg/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\dfgdgController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_liveaccount', 'Modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');});
Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'Modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'Modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);