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
})->name('profile')->where(['name' => '[a-z]+']);

//Generating URLs To Named Routes
Route::get('/named', function () {
    return redirect()->route('profile', ['name' => "james"]);
});

//Route Prefix
Route::prefix('admin')->group(function () {
    Route::get('/group1', function () {
        echo "Group 1";
    })->name('group1');

    Route::get('/group2', function () {
        echo "Group 2";
    })->name('group2');

    Route::get('/group/3', function () {
        echo "Group 3";
    })->name('group3');
});
