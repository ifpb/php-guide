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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('alumni', 'AlumniController');

Route::get('/', 'AlumniController@index');

Route::resource('alumni', 'AlumniController');

Route::middleware(['auth'])->group(function () {
    Route::resource('alumni', 'AlumniController')->only([
        'create', 'store', 'edit', 'update', 'destroy'
    ]);
});

// Route::resource('alumni', 'AlumniController')->only([
//     'create', 'store', 'edit', 'update', 'destroy'
// ])->middleware('guest');
