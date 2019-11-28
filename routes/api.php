<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['preventBackHistory']], function () {
    Route::post('/register', 'API\AuthController@registerNewUser');
    Route::post('/signin', 'API\AuthController@signupUser');
    Route::get('/allowed-link', 'API\AllowedLinkController@getAllowedLink');
});

Route::group(['middleware' => ['preventBackHistory', 'auth:api']], function () {
    Route::resource('/user-credentials', 'API\UserController');
    Route::resource('/doc-products', 'API\DocProductController');
});



// Route::group(['middleware' => ['preventBackHistory', 'auth:api']], function () { });
