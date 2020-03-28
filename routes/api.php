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
        // Entry themes
        Route::group([
            'prefix' => 'themes'
        ], function(){
            Route::get('/', 'EntryThemeController@index');
            Route::group(['middleware' =>  ['isAdmin']], function (){
                Route::post('/{id}', 'EntryThemeController@edit');
                Route::post('/', 'EntryThemeController@store');
                Route::get('/delete/{id}', 'EntryThemeController@destroy');
            });
        });
        // Entries
        Route::get('/', 'EntryController@index');
        Route::get('/{id}', 'EntryController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/{id}', 'EntryController@edit');
            Route::post('/', 'EntryController@store');
            Route::get('/delete/{id}', 'EntryController@destroy');
        });
    });
// Documents
    Route::prefix('docs')->group(function() {
        Route::get('/', 'DocumentController@index');
        Route::get('/{id}', 'DocumentController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'DocumentController@store');
            Route::post('/{id}', 'DocumentController@edit');
            Route::get('/delete/{id}', 'DocumentController@destroy');
        });
    });
// Reviews
    Route::prefix('reviews')->group(function() {
        Route::get('/', 'ReviewController@index');
        Route::get('/{id}', 'ReviewController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'ReviewController@create');
            Route::post('/{id}', 'ReviewController@update');
            Route::get('/delete/{id}', 'ReviewController@destroy');
        });
    });
// Slider
    Route::prefix('sliders')->group(function() {
        Route::get('/', 'SliderController@index');
        Route::get('/{id}', 'SliderController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/', 'SliderController@store');
            Route::post('/{id}', 'SliderController@update');
        });
    });
// Cards (parts that slider is consist of) that attached to slider
    Route::prefix('slider-details')->group(function() {
        Route::get('/{sliderId}', 'SliderDetailsController@show');
        Route::group(['middleware' =>  ['isAdmin']], function (){
            Route::post('/{id}', 'SliderDetailsController@update');
            Route::post('/', 'SliderDetailsController@store');
            Route::get('/delete/{sliderId}', 'SliderDetailsController@destroy');
        });
    });
// Files witch used as images and documents
    Route::group([
        'prefix' => 'files',
        'middleware' => ['isAdmin']
    ] ,function() {
        Route::get('/', 'StorageController@index');
        Route::get('/{id}', 'StorageController@show');
        Route::post('/', 'StorageController@store');
        Route::get('/delete/{id}', 'StorageController@destroy');
    });
// Faq question
    Route::prefix('faq')->group(function() {
        // Categories of questions
        Route::prefix('categories')->group(function() {
            Route::get('/', 'FaqCategoryController@index');
            Route::get('/{id}/questions', 'FaqController@index');
            Route::group(['middleware' =>  ['isAdmin']], function (){
                Route::get('/delete/{id}', 'FaqCategoryController@destroy')->where('id','[^1]$|[0-9]{2,}');
                Route::post('/', 'FaqCategoryController@store');
                Route::post('/{id}', 'FaqCategoryController@update');
            });
        });
        // Questions
        Route::group([
            'middleware' =>  ['isAdmin'],
            'prefix' => 'questions'
        ], function() {
            Route::post('/', 'FaqController@store');
            Route::post('/{id}', 'FaqController@update');
            Route::get('/delete/{id}', 'FaqController@destroy');
        });
    });

    // Form handler
    Route::group(['prefix' => 'form'],function(){
        Route::get('delete/contact-us/{id}', 'FormController@destroyContactUsRecord');
        Route::get('contact-us', 'FormController@index');
    });

    // Menus
    Route::group(['prefix' => 'menu'],function(){
        // Header menu
        Route::group(['prefix' => 'main'],function(){
            Route::get('/', 'MenuController@index');
            Route::post('/', 'MenuController@store');
        });
        // Mobile menu
        Route::group(['prefix' => 'mobile'],function(){
            Route::get('/', 'MobileMenuController@index');
            Route::post('/', 'MobileMenuController@store');
        });
    });
});
Route::get('urls', function(){
   return \App\Models\Url::all();
});

// forms
Route::post('form/contact-us', 'FormController@handleContactUsForm');
Route::post('form/faq', 'FormController@handleFaqForm');