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

Route::prefix('admin')->namespace('Admin')->middleware('admin')->group(function () {
    Route::get('/', 'AdminPanelController@index')->name('admin.home');

    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
    });

    Route::prefix('birthdays')->group(function () {
        Route::get('/', 'BirthdayController@index')->name('birthdays.index');
        Route::get('/create', 'BirthdayController@create')->name('birthdays.create');
        Route::post('/', 'BirthdayController@store')->name('birthdays.store');
        Route::get('/{birthday}/edit', 'BirthdayController@edit')->name('birthdays.edit');
        Route::patch('/{birthday}', 'BirthdayController@update')->name('birthdays.update');
        Route::delete('/{birthday}/delete', 'BirthdayController@destroy')->name('birthdays.destroy');
    });
});
