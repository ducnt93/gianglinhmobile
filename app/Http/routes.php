<?php

/*Route::get('/', function () {
    return view('Trang chủ');
});*/
Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

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


//route admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'ADMIN'], function () {
    require Config::get('configroute.path_admin_route');
});

Route::group(['prefix' => 'admin', 'namespace' => 'ADMIN'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('register', ['as' => 'admin1.auth.register', 'uses' => 'AuthController@getAdd']);
        Route::get('login', ['as' => 'admin.auth.login', 'uses' => 'AuthController@getLogin']);
        Route::get('logout', ['as' => 'admin.auth.logout', 'uses' => 'AuthController@getLogout']);
        Route::post('register', ['as' => 'admin.auth.register', 'uses' => 'AuthController@postAdd']);
        Route::post('login', ['as' => 'admin.auth.login', 'uses' => 'AuthController@postLogin']);
    });
});

Route::group(['prefix' => 'member', 'namespace' => 'Auth'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('register', ['as' => 'member.auth.register', 'uses' => 'AuthController@getAdd']);
        Route::get('login', ['as' => 'member.auth.login', 'uses' => 'AuthController@getLogin']);
        Route::get('logout', ['as' => 'member.auth.logout', 'uses' => 'AuthController@getLogout']);
        Route::post('register', ['as' => 'member.auth.register', 'uses' => 'AuthController@postAdd']);
        Route::post('login', ['as' => 'member.auth.login', 'uses' => 'AuthController@postLogin']);
    });
});

