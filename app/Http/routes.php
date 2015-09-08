<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::group(['prefix' => env('ADMIN_NAME'), 'namespace' => 'Admin'], function() {
    require_once __DIR__ . "/Routes/Admin/Dashboard.php";
    require_once __DIR__ . "/Routes/Admin/Auth.php";
});


/*
 * Redirect root routes to clients area
 */


if (class_exists("Module") && Module::find('cms')) {

    Route::get('/', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');
    Route::get('/{page_name}', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');

    Route::group(['prefix' => env('CLIENT_NAME'), 'namespace' => 'Client'], function () {
    require_once __DIR__ . "/Routes/Client/Dashboard.php";
    require_once __DIR__ . "/Routes/Client/Auth.php";
    });
} else {

    Route::get('/', function () {

        return Redirect::to(env('CLIENT_NAME'));
    });
}
