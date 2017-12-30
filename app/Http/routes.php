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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/login/facebook', 'UserController@loginFacebook');
    Route::get('/login/google', 'UserController@loginGoogle');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', 'UserController@register');
});

/*
Route::group(['middleware' => ['web', 'admin']], function () {
    
});
*/