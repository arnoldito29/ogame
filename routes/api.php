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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('Api\Controllers')->group(function() {
    Route::prefix('ogame')->group(function() {
        Route::post('/stats_points', 'OgameStatController@statsPoints')->name('ogame.statsPoints');
        Route::post('/stats_economy', 'OgameStatController@statsEconomy')->name('ogame.statsEconomy');
        Route::post('/stats_reseach', 'OgameStatController@statsReseach')->name('ogame.statsReseach');
        Route::post('/stats_military', 'OgameStatController@statsMilitary')->name('ogame.statsMilitary');

        Route::post('/galaxy', 'OgameStatController@galaxy')->name('ogame.galaxy');
    });
});
