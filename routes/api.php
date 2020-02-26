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
    // articles and news
    Route::prefix('entries')->group(function() {
        Route::get('/', 'EntryController@index');
        Route::get('/{id}', 'EntryController@show');
        Route::post('/{id}', 'EntryController@edit');
        Route::post('/', 'EntryController@store');
        Route::get('/delete/{id}', 'EntryController@destroy');
    });
    // documents
    Route::prefix('docs')->group(function() {
        Route::get('/', 'DocumentController@index');
        Route::post('/', 'DocumentController@store');
        Route::post('/{id}', 'DocumentController@edit');
        Route::get('/{id}', 'DocumentController@show');
        Route::get('/delete/{id}', 'DocumentController@destroy');
    });
    // reviews
    Route::prefix('reviews')->group(function() {
        Route::get('/', 'ReviewController@index');
        Route::post('/', 'ReviewController@create');
        Route::post('/{id}', 'ReviewController@update');
        Route::get('/{id}', 'ReviewController@show');
        Route::get('/delete/{id}', 'ReviewController@destroy');
    });
    //slider
    Route::prefix('sliders')->group(function() {
        Route::post('/', 'SliderController@store');
        Route::get('/', 'SliderController@index');
        Route::get('/{id}', 'SliderController@show');
        Route::post('/{id}', 'SliderController@update');
    });
    // cards (parts that slider is consist of) that attached to slider
    Route::prefix('slider-details')->group(function() {
        Route::post('/', 'SliderDetailsController@store');
        Route::get('/{sliderId}', 'SliderDetailsController@show');
        Route::get('/delete/{sliderId}', 'SliderDetailsController@destroy');
        Route::post('/{id}', 'SliderDetailsController@update');
    });
    // files witch used as images and documents
    Route::prefix('files')->group(function() {
        Route::post('/', 'StorageController@store');
        Route::get('/', 'StorageController@index');
        Route::get('/{id}', 'StorageController@show');
        Route::get('/delete/{id}', 'StorageController@destroy');
    });
    // faq question
    Route::prefix('faq')->group(function() {
        // categories of questions
        Route::prefix('categories')->group(function() {
            Route::post('/', 'FaqCategoryController@store');
            Route::post('/{id}', 'FaqCategoryController@update');
            Route::get('/', 'FaqCategoryController@index');
            Route::get('/delete/{id}', 'FaqCategoryController@destroy')->where('id','[^1]$|[0-9]{2,}');
            Route::get('/{id}/questions', 'FaqController@index');
        });
        // questions
        Route::prefix('questions')->group(function() {
            Route::post('/', 'FaqController@store');
            Route::post('/{id}', 'FaqController@update');
            Route::get('/delete/{id}', 'FaqController@destroy');
        });
    });
});
