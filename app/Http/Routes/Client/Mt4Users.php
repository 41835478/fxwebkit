<?php


Route::group(['middleware' => ['authenticate.client']], function () {
    Route::controller('mt4users', 'Mt4UsersController', [
        'getAddMt4User' => 'client.addMt4User',
        'getMt4UserFullDetails' => 'client.addMt4UserFullDetails',
    ]);
});

