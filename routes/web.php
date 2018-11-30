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
//use App\Http\Middleware\CheckSession;
Route::get('/hi', function (Request $request) {
    $output = new Symfony\Component\Console\Output\ConsoleOutput();
    $output->writeln("hiiiiiiiiiiiii");
    return "Hi world";
});

Route::get('login/{service}', 'LoginController@redirectToProvider');

Route::get('login/{service}/callback', 'LoginController@handleProviderCallback');
Route::get('/{service}/callback', 'LoginController@handleProviderCallback');
Route::get('/add/{num1}/{num2}', 'TestController@testSum');

Route::get('/signin', 'DataHandler@signIn');
Route::get('/signout', 'DataHandler@signOut');

Route::group(['middleware' => 'App\Http\Middleware\CheckSession'], function () {
    Route::get('/ysearch/{q}', 'TestController@testYoutubeSearch');
    Route::get('/list/{list}', 'TestController@playlistSearch');
    Route::get('/testapi/{var}', 'LoginController@testAPI');
    Route::get('/home', 'DataHandler@getPlaylists');
    Route::get('/playlists', 'DataHandler@getPlaylists');
    Route::get('/playlist/{playlistId}', 'DataHandler@getPlaylistItems');
    Route::get('/', function () {
        return redirect('/home');
    });
    Route::get('/postselection', 'DataHandler@setCategories');

});