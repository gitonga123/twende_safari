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

Route::get('/trick', function () {
    return redirect()->route('group2');
})->name("tricks");

//Route Model Biding
Route::get('api/users/{user}', function (App\User $user) {
    $email = array("id" => $user->email);
    return json_encode($email);
});

//Assigning Middleware to Routes
Route::get('/user/profile', function () {
    echo "Am In the Profile URL";
})->middleware('age');

Route::get('users/{id}', 'UserController@show')->name('profile');
// Route::apiResources(['carList' => 'CarController@carList']);
Route::get('cars', 'CarController@create')->name('carView');
Route::post('cars', 'CarController@store')->name('carRegister');
Route::get('carList', 'CarController@carList')->name('carList');
Route::get('car', 'CarController@index');
//Resource controller binding
Route::resource('tasks', 'TasksController');

//Route Model Binding
Route::get('tasks/mode/{id}', function ($id) {
    $tasking = Task::findOrFail($id);
});

//Route Model Binding Implicit
Route::get('tasks/mode/{tasking}', function (Task $tasking) {
   return view('tasks.show')->with('tasking', $tasking);
});

//Custom Route Model Binding
Route::get('tasks/models/{event}', function (Task $event) {
    return view('events.show')->with('event', $event);
});
