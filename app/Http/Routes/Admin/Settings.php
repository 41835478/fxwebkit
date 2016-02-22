<?php

/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function () {
    Route::controller('settings', 'SettingsController', [
        'getAdminsList' => 'admin.adminsList',
        'getEditUser' => 'general.editUser',
        'getAddUser' => 'general.addUser',
        'getUserDetails' => 'general.userDetails',
        'getMt4UsersList' => 'admin.mt4UsersList',
        'getMt4UsersDetails' => 'admin.mt4UsersDetails',
        'getEmailTemplates' => 'admin.addEmailTemplates',
        'getDeleteUser' => 'admin.deleteUser',
        'getMassMailer' => 'admin.massMailer',
        'getSettings'=>'admin.settings'
    ]);
});

