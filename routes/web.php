<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/signin');
});

Route::group(['middleware' => ['preventBackHistory']], function () {
    Route::get('/signin', 'Auth\LoginController@userLogin')->name('page.auth.signin');
    Route::get('/register', 'Auth\LoginController@newUser')->name('page.auth.register');
    Route::get('/home', 'API\HomeController@homepage');
    Route::get('/page-products', 'API\HomeController@products');
});

// Route::group(['middleware' => ['preventBackHistory', 'auth:api']], function () { });
