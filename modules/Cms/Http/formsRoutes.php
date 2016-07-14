<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_ttt', 'modules\Cms\Http\Controllers\forms\cms_forms_tttController');
});

Route::get('cms_forms_ttt/form', [
    'as' => 'cms_forms_ttt.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_tttController@cms_create'
]);

Route::post('cms_forms_ttt/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_tttController@cms_store'
]);


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {

    Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');
});
Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);





Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');
});
Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);



Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_sdfs', 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController');
});
Route::get('cms_forms_sdfs/form', [
    'as' => 'cms_forms_sdfs.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController@cms_create'
]);
Route::post('cms_forms_sdfs/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfsController@cms_store'
]);




Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_sdfg', 'modules\Cms\Http\Controllers\forms\cms_forms_sdfgController');
});
Route::get('cms_forms_sdfg/form', [
    'as' => 'cms_forms_sdfg.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfgController@cms_create'
]);
Route::post('cms_forms_sdfg/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_sdfgController@cms_store'
]);







Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_gfbsh', 'modules\Cms\Http\Controllers\forms\cms_forms_gfbshController');

});
Route::get('cms_forms_gfbsh/form', [
    'as' => 'cms_forms_gfbsh.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_gfbshController@cms_create'
]);
Route::post('cms_forms_gfbsh/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_gfbshController@cms_store'
]);







//Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
//Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');});
//Route::get('cms_forms_liveaccount/form', [
//    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
//]);
//Route::post('cms_forms_liveaccount/form', [
//    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
//]);
//
//
//
//
//Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
//Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');});
//Route::get('cms_forms_liveaccount/form', [
//    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
//]);
//Route::post('cms_forms_liveaccount/form', [
//    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
//]);




Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {

Route::resource('cms_forms_liveaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController');
    /*
     *
     *
     *
     *
     *
     *
     *
     */
    Route::post('admin-approve', [
        'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@postShow',
        'as'=>'admin.liveFormApprove'
    ]);
    /*
     *
     *
     *
     *
     *
     *
     *
     */


});


Route::get('cms_forms_liveaccount/form', [
    'as' => 'cms_forms_liveaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_create'
]);
Route::post('cms_forms_liveaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_liveaccountController@cms_store'
]);



Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_demoaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController');
});
Route::get('cms_forms_demoaccount/form', [
    'as' => 'cms_forms_demoaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController@cms_create'
]);
Route::post('cms_forms_demoaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController@cms_store'
]);







Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_demoaccount', 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController');});
Route::get('cms_forms_demoaccount/form', [
    'as' => 'cms_forms_demoaccount.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController@cms_create'
]);
Route::post('cms_forms_demoaccount/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_demoaccountController@cms_store'
]);






Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_referringpartner', 'modules\Cms\Http\Controllers\forms\cms_forms_referringpartnerController');});
Route::get('cms_forms_referringpartner/form', [
    'as' => 'cms_forms_referringpartner.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_referringpartnerController@cms_create'
]);
Route::post('cms_forms_referringpartner/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_referringpartnerController@cms_store'
]);






Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_contactus', 'modules\Cms\Http\Controllers\forms\cms_forms_contactusController');});
Route::get('cms_forms_contactus/form', [
    'as' => 'cms_forms_contactus.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_contactusController@cms_create'
]);
Route::post('cms_forms_contactus/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_contactusController@cms_store'
]);








Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_careercenter', 'modules\Cms\Http\Controllers\forms\cms_forms_careercenterController');});
Route::get('cms_forms_careercenter/form', [
    'as' => 'cms_forms_careercenter.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_careercenterController@cms_create'
]);
Route::post('cms_forms_careercenter/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_careercenterController@cms_store'
]);





Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_currencyconvertor', 'modules\Cms\Http\Controllers\forms\cms_forms_currencyconvertorController');});
Route::get('cms_forms_currencyconvertor/form', [
    'as' => 'cms_forms_currencyconvertor.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_currencyconvertorController@cms_create'
]);
Route::post('cms_forms_currencyconvertor/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_currencyconvertorController@cms_store'
]);


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {

Route::resource('cms_forms_downloadcenter', 'modules\Cms\Http\Controllers\forms\cms_forms_downloadcenterController');

});

Route::get('cms_forms_downloadcenter/form', [
    'as' => 'cms_forms_downloadcenter.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_downloadcenterController@cms_create'
]);
Route::post('cms_forms_downloadcenter/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_downloadcenterController@cms_store'
]);


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
    Route::resource('cms_forms_emailtemplates', 'modules\Cms\Http\Controllers\forms\cms_forms_emailtemplatesController');
});

Route::get('cms_forms_emailtemplates/form', [
    'as' => 'cms_forms_emailtemplates.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_emailtemplatesController@cms_create'
]);
Route::post('cms_forms_emailtemplates/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_emailtemplatesController@cms_store'
]);

Route::get('emailtemplates/create-form-template', [
    'as' => 'emailtemplates.createFormTemplate', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_emailtemplatesController@directUpdateForm'
]);


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_search', 'modules\Cms\Http\Controllers\forms\cms_forms_searchController');});
Route::get('cms_forms_search/form', [
    'as' => 'cms_forms_search.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_searchController@cms_create'
]);
Route::post('cms_forms_search/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_searchController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_payment', 'modules\Cms\Http\Controllers\forms\cms_forms_paymentController');});
Route::get('cms_forms_payment/form', [
    'as' => 'cms_forms_payment.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_paymentController@cms_create'
]);
Route::post('cms_forms_payment/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_paymentController@cms_store'
]);Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'cms', 'namespace' => ''], function() {
Route::resource('cms_forms_testbuttonstyle', 'modules\Cms\Http\Controllers\forms\cms_forms_testbuttonstyleController');});
Route::get('cms_forms_testbuttonstyle/form', [
    'as' => 'cms_forms_testbuttonstyle.form', 'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_testbuttonstyleController@cms_create'
]);
Route::post('cms_forms_testbuttonstyle/form', [
    'uses' => 'modules\Cms\Http\Controllers\forms\cms_forms_testbuttonstyleController@cms_store'
]);