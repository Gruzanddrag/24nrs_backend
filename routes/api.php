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
// Auth
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::group([
        'middleware' => 'jwt'
    ], function(){
        Route::post('registration', 'AuthController@registration')
            ->middleware(['isAdmin:super_admin'])
            ->name('registration');
        Route::post('me', 'AuthController@me')->name('me');
    });
});
Route::group([
    'middleware' => 'jwt'
], function() {
    Route::prefix('entries')->group(function() {
        Route::get('/', 'EntryController@index');
        Route::get('/{id}', 'EntryController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/{id}', 'EntryController@edit');
            Route::post('/', 'EntryController@store');
            Route::get('/delete/{id}', 'EntryController@destroy');
        });
    });
// documents
    Route::prefix('docs')->group(function() {
        Route::get('/', 'DocumentController@index');
        Route::get('/{id}', 'DocumentController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'DocumentController@store');
            Route::post('/{id}', 'DocumentController@edit');
            Route::get('/delete/{id}', 'DocumentController@destroy');
        });
    });
// reviews
    Route::prefix('reviews')->group(function() {
        Route::get('/', 'ReviewController@index');
        Route::get('/{id}', 'ReviewController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'ReviewController@create');
            Route::post('/{id}', 'ReviewController@update');
            Route::get('/delete/{id}', 'ReviewController@destroy');
        });
    });
//slider
    Route::prefix('sliders')->group(function() {
        Route::get('/', 'SliderController@index');
        Route::get('/{id}', 'SliderController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'SliderController@store');
            Route::post('/{id}', 'SliderController@update');
        });
    });
// cards (parts that slider is consist of) that attached to slider
    Route::prefix('slider-details')->group(function() {
        Route::get('/{sliderId}', 'SliderDetailsController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/{id}', 'SliderDetailsController@update');
            Route::post('/', 'SliderDetailsController@store');
            Route::get('/delete/{sliderId}', 'SliderDetailsController@destroy');
        });
    });
// files witch used as images and documents
    Route::group([
        'prefix' => 'files',
        'middleware' => ['isAdmin']
    ] ,function() {
        Route::get('/', 'StorageController@index');
        Route::get('/{id}', 'StorageController@show');
        Route::post('/', 'StorageController@store');
        Route::get('/delete/{id}', 'StorageController@destroy');
    });
// faq question
    Route::prefix('faq')->group(function() {
        // categories of questions
        Route::prefix('categories')->group(function() {
            Route::get('/', 'FaqCategoryController@index');
            Route::get('/{id}/questions', 'FaqController@index');
            Route::group(['middleware' =>  ['isAdmin']], function (){
                Route::get('/delete/{id}', 'FaqCategoryController@destroy')->where('id','[^1]$|[0-9]{2,}');
                Route::post('/', 'FaqCategoryController@store');
                Route::post('/{id}', 'FaqCategoryController@update');
            });
        });
        // questions
        Route::group([
            'middleware' =>  ['isAdmin'],
            'prefix' => 'questions'
        ], function() {
            Route::post('/', 'FaqController@store');
            Route::post('/{id}', 'FaqController@update');
            Route::get('/delete/{id}', 'FaqController@destroy');
        });
    });
});

