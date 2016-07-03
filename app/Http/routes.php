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

Route::get('/', function () {
    return view('Trang chủ');
});

/*// Route api
Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require Config::get('generator.path_api_routes');
    });
});*/

// Route production
Route::group(['prefix' => '/', 'namespace' => 'Production'], function () {
    require Config::get('configroute.path_production_route');
});


/*//route admin
Route::group(['prefix' => 'admin', 'namespace' => 'ADMIN'], function () {
    require Config::get('configroute.path_admin_route');
});*/



