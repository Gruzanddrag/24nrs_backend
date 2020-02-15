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
Route::middleware('cors')->group(function() {
    Route::prefix('entries')->group(function() {
        Route::get('/', 'EntryController@index');
        Route::get('/{id}', 'EntryController@show');
        Route::post('/{id}', 'EntryController@edit');
        Route::post('/', 'EntryController@store');
        Route::get('/delete/{id}', 'EntryController@destroy');
    });
    Route::prefix('docs')->group(function() {
        Route::get('/', 'DocumentController@index');
        Route::post('/', 'DocumentController@store');
        Route::post('/{id}', 'DocumentController@edit');
        Route::get('/{id}', 'DocumentController@show');
        Route::get('/delete/{id}', 'DocumentController@destroy');
    });
    Route::prefix('reviews')->group(function() {
        Route::get('/', 'ReviewController@index');
        Route::post('/', 'ReviewController@create');
        Route::post('/{id}', 'ReviewController@update');
        Route::get('/{id}', 'ReviewController@show');
        Route::get('/delete/{id}', 'ReviewController@destroy');
    });
    Route::prefix('sliders')->group(function() {
        Route::post('/', 'SliderController@store');
        Route::get('/', 'SliderController@index');
    });
    Route::prefix('files')->group(function() {
        Route::post('/', 'StorageController@store');
        Route::get('/', 'StorageController@index');
        Route::get('/{id}', 'StorageController@show');
        Route::get('/delete/{id}', 'StorageController@destroy');
    });
});
