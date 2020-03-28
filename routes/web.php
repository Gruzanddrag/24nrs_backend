<?php

Route::get('/', "ViewController@main")->name('home');

Route::get('article/{id}',"ViewController@article")->name('article');

Route::get('articles',"ViewController@articles")->name('articles');

Route::get('contacts', "ViewController@contacts")->name('contacts');

Route::prefix('landing')->group(function(){
    Route::get('/', "ViewController@landing");
    Route::get('/faq', "ViewController@landingFaq");
    Route::get('/faq-main', "ViewController@mainFaq");
});


Route::get('news', "ViewController@news")->name('news');

Route::get('news/{id}', "ViewController@article")->name('single-news');

Route::get('review/{id}', "ViewController@review")->name('review');

Route::get('services', "ViewController@services")->name('services');

Route::get('bankguaranties', "ViewController@bankguaranties")->name('bankguaranties');

Route::get('documents', "ViewController@documents")->name('documents');

Route::get('mchs', "ViewController@mchs")->name('mchs');


Route::prefix('faq')->group(function() {
    Route::get('/', "ViewController@faq")->name('faq');
    Route::post('/ty', function (){
        return view('pages.faq-ty');
    });
});

Route::get('document/{id}', 'ViewController@document')->name('document');

Route::get('news-standalone', function () {
    return view('pages.news-standalone');
});

Route::get('ty', function () {
    return view('pages.ty');
});

Route::post('ty', function () {
    return view('pages.ty');
});

Route::get('NotFound', function () {
    return view('pages.404');
});
