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
    Route::get('/entries', 'EntryController@index');
    Route::get('/entries/{id}', 'EntryController@show');
    Route::post('/entries/{id}', 'EntryController@edit');
    Route::post('/entries', 'EntryController@store');
    Route::post('/entries/delete/{id}', 'EntryController@destroy');
});
