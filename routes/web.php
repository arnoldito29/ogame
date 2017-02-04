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
    
    Route::resource('reviews', 'ReviewsController', ['only' => ['index', 'show', 'create'] ] );
    Route::get('reviews/{id}/edit', 'ReviewsController@edit');
    Route::post('reviews/edit', 'ReviewsController@postEdit');
    Route::post('reviews/delete', 'ReviewsController@postDelete');
    Route::post('reviews/add', 'ReviewsController@postAdd');
    Route::post('reviews/active', 'ReviewsController@postActive');
    
    Route::resource('contents', 'ContentsController', ['only' => ['index', 'show', 'create'] ] );
    Route::get('contents/{id}/edit', 'ContentsController@edit');
    Route::post('contents/edit', 'ContentsController@postEdit');
    Route::post('contents/delete', 'ContentsController@postDelete');
    Route::post('contents/add', 'ContentsController@postAdd');
    Route::post('contents/active', 'ContentsController@postActive');
    
    Route::resource('faq', 'FaqController', ['only' => ['index', 'show', 'create'] ] );
    Route::get('faq/{id}/edit', 'FaqController@edit');
    Route::post('faq/edit', 'FaqController@postEdit');
    Route::post('faq/delete', 'FaqController@postDelete');
    Route::post('faq/add', 'FaqController@postAdd');
    Route::post('faq/active', 'FaqController@postActive');
    
    Route::resource('benefits', 'BenefitsController', ['only' => ['index', 'show', 'create'] ] );
    Route::get('benefits/{id}/edit', 'BenefitsController@edit');
    Route::post('benefits/edit', 'BenefitsController@postEdit');
    Route::post('benefits/delete', 'BenefitsController@postDelete');
    Route::post('benefits/add', 'BenefitsController@postAdd');
    Route::post('benefits/active', 'BenefitsController@postActive');
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
    Route::get('/get-started', 'HomeController@getStarted');

    Route::get('ui', function() {
        
        return View::make('ui');
    });
    
    Route::get('templates/{name}', function( $name ) {
        
        return View::make('html_templates/' . $name );
    });

    Route::get('login', function() {
        
        return View::make('login');
    });
    
    //POST route
    Auth::routes();

    Route::get('home', 'HomeController@index');
    Route::get('contents/{name}/{id}', [ 'as' => 'contents', 'uses' => 'ContentsController@activeMenu']);
    
    Route::get('user/edit', [ 'as' => 'user/edit', 'uses' => 'UsersController@userEdit' ]);
    Route::get('user/gifts', [ 'as' => 'user/gifts', 'uses' => 'UsersController@getGifts' ]);
    Route::get('user/wallet', [ 'as' => 'user/wallet', 'uses' => 'UsersController@getWallet' ]);
    Route::post('user/login', 'UsersController@postLogin');
    Route::post('user/register', 'UsersController@postRegister');
    Route::get('logout', 'UsersController@logout');
    
    Route::get('faq', [ 'as' => 'faq', 'uses' => 'FaqController@showActive' ] );
    
    Route::get('ride', 'RideController@index');
    Route::get('ride/out', 'RideController@out');
    Route::get('ride/inline', 'RideController@inline');
    Route::get('ride/wait', 'RideController@wait');
    Route::post('ride/search', 'RideController@search');
    
    Route::get('messages/{id}', [ 'as' => 'message', 'uses' => 'MessagesController@message']);
});