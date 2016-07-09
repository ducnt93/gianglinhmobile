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
    Route::get('register', ['as' => 'admin.register', 'uses' => 'AuthController@getAdd']);
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);
    Route::post('register', ['as' => 'admin.register', 'uses' => 'AuthController@postAdd']);
    Route::post('login', ['as' => 'admin.login', 'uses' => 'AuthController@postLogin']);
});

Route::group(['prefix' => 'member', 'namespace' => 'Auth'], function () {
    Route::get('register', ['as' => 'member.register', 'uses' => 'AuthController@getAdd']);
    Route::get('login', ['as' => 'member.login', 'uses' => 'AuthController@getLogin']);
    Route::get('logout', ['as' => 'member.logout', 'uses' => 'AuthController@getLogout']);
    Route::post('register', ['as' => 'member.register', 'uses' => 'AuthController@postAdd']);
    Route::post('login', ['as' => 'member.login', 'uses' => 'AuthController@postLogin']);
    Route::get('password/reset/{token}', ['as' => 'member.getRest', 'uses' => 'PasswordController@getReset']);
    Route::post('password/reset', ['as' => 'member.postReset', 'uses' => 'PasswordController@postReset']);
    Route::get('password/email', ['as' => 'member.getEmail', 'uses' => 'PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'member.postEmail', 'uses' => 'PasswordController@postEmail']);

});


// Login facebook social
Route::get('facebook/redirect', ['as' => 'facebook.redirect', 'uses' => 'Auth\SocialController@redirectToProviderFacebook']);
Route::get('facebook/callback', ['as' => 'facebook.callback', 'uses' => 'Auth\SocialController@handleProviderCallbackFacebook']);

// Login google social
Route::get('google/redirect', ['as' => 'member.facebook.redirect', 'uses' => 'Auth\SocialController@redirectToProviderGoogle']);
Route::get('google/callback', ['as' => 'member.facebook.callback', 'uses' => 'Auth\SocialController@handleProviderCallbackGoogle']);
