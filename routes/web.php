<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

$allow = [ 'admin', 'logout', 'login', 'api' ];

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    
    Route::get('/', function() {
        
        return View::make('admin.admin');
    });
    
    Route::get('home', 'HomeController@index');
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'create'] ] );
    Route::get('users/{id}/edit', 'UsersController@edit');
    Route::post('users/edit', 'UsersController@postEdit');
    Route::post('users/delete', 'UsersController@postDelete');
    Route::post('users/add', 'UsersController@postAdd');
});

$locale = Request::segment(1);

if (!in_array($locale, Config::get('app.available_locales'))) {
    
    if ( !empty( $locale ) && !in_array( $locale, $allow ) ) {
        
        $url = url( 'lt' );
        header('Location: '.  $url );
        die();
    }
    
    $locale = 'lt';
}

Lang::setLocale( $locale );

define( 'LANG', $locale );

$locale = Lang::getLocale();

if ( empty( $locale ) ) {
    
    $locale = 'lt';
}

Route::get('/', 'HomeController@index');

Route::get('login', function() {

    return View::make('login');
});

Auth::routes();

Route::group(array('prefix' => $locale ), function() {
    

    Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@index' ]);
    
    Route::get('templates/{name}', function( $name ) {
        
        return View::make('html_templates/' . $name );
    });

    Route::get('login', function() {
        
        return View::make('login');
    });
    
    //POST route
    Auth::routes();

    Route::get('home', 'HomeController@index');
    
    Route::post('user/login', 'UsersController@postLogin');
    Route::post('user/register', 'UsersController@postRegister');
    Route::get('logout', 'UsersController@logout');
});