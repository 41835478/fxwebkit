<?php
//$password=\Illuminate\Support\Facades\Hash::make('admin');dd($password);
//$2y$10$TuVA/eIMmfxa4.wEGCXokOg5c71hAWpgpeiKRxacM7hgUrTHROLVO
Route::group(['prefix' => env('ADMIN_NAME'), 'namespace' => 'Admin'], function() {
    require_once __DIR__ . "/Routes/Admin/Dashboard.php";
    require_once __DIR__ . "/Routes/Admin/Settings.php";
    require_once __DIR__ . "/Routes/Admin/Auth.php";
    require_once __DIR__ . "/Routes/Admin/User.php";
});


/*
 * Redirect root routes to clients area
 */


if (class_exists("Module") && Module::find('cms')) {

    Route::group(['prefix' => env('CLIENT_NAME'), 'namespace' => 'Client'], function () {

        require_once __DIR__ . "/Routes/Client/Dashboard.php";
        require_once __DIR__ . "/Routes/Client/Auth.php";
        require_once __DIR__ . "/Routes/Client/Mt4Users.php";
         require_once __DIR__ . "/Routes/Client/User.php";
    });

    Route::get('/', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');
    Route::get('/{page_name}', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');
} else {

    Route::get('/', function () {

        return Redirect::to(env('CLIENT_NAME'));
    });
}
//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});
