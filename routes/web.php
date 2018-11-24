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
    return view('welcome');
});

Route::get('/hi', function () {
    return "Hi world";
});

//Route::get('/testapi', 'TestController@test_api');
Route::get('login/{service}', 'LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'LoginController@handleProviderCallback');
Route::get('/add/{num1}/{num2}', 'TestController@testSum');
Route::get('/ysearch/{q}', 'TestController@testYoutubeSearch');
Route::get('/list/{list}', 'TestController@playlistSearch');
Route::get('/testapi', 'LoginController@testAPI');