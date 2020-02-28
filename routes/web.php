<?php

Route::get('/', "ViewController@main");

Route::get('article/{id}',"ViewController@article");


Route::get('articles',"ViewController@articles");

Route::get('contacts', function () {
    return view('pages.contacts');
});

Route::get('document', function () {
    return view('pages.document');
});

Route::get('documents', function () {
    return view('pages.documents');
});
Route::prefix('landing')->group(function(){
    Route::get('/', "ViewController@landing");
    Route::get('/faq', "ViewController@landingFaq");
    Route::get('/faq-main', "ViewController@mainFaq");
});

Route::get('news-standalone', function () {
    return view('pages.news-standalone');
});

Route::get('news', function () {
    return view('pages.news');
});

Route::get('review/{id}', "ViewController@review");

Route::get('services', function () {
    return view('pages.services');
})->name('services');

Route::get('ty', function () {
    return view('pages.ty');
});

Route::get('faq', "ViewController@faq");

Route::get('NotFound', function () {
    return view('pages.404');
});
