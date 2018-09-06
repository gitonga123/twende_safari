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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\AuthController@getFacebookCallback');

//Route that responds to multiple HTTPS requests
Route::match(['get', 'post'], '/dial', function () {
    var_dump("AM A GET OR POST POST");
});

//Redirect Routes
Route::redirect('/dials', '/home');

//Name Routes
Route::get('/testing/{name}', function ($name) {
    echo "Route name is {$name}";
})->name('profile');

//Generating URLs To Named Routes
