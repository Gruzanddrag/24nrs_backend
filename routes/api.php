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
Route::middleware('cors')->group(function(){
    Route::prefix('entries')->group(function() {
        Route::get('/', 'EntryController@index');
        Route::get('/{id}', 'EntryController@show');
        Route::post('/{id}', 'EntryController@edit');
        Route::post('/', 'EntryController@store');
        Route::post('/delete/{id}', 'EntryController@destroy');
    });
    Route::prefix('docs')->group(function() {
        Route::get('/', 'DocumentController@index');
        Route::post('/', 'DocumentController@store');
        Route::post('/{id}', 'DocumentController@edit');
        Route::get('/{id}', 'DocumentController@show');
        Route::post('/delete/{id}', 'DocumentController@destroy');
    });
});
