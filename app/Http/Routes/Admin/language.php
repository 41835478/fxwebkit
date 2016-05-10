<?php

/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function () {

    Route::controller('translate', 'LanguageController', [
        'getEditLanguage'=>'admin.language.editLanguage'
    ]);
});

