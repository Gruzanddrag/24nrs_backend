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


Route::prefix('faq')->group(function() {
    Route::get('/', "ViewController@faq")->name('faq');
    Route::post('/ty', function (){
        return view('pages.faq-ty');
    });
});

Route::get('document', function () {
    return view('pages.document');
});

Route::get('documents', function () {
    return view('pages.documents');
});
Route::get('news-standalone', function () {
    return view('pages.news-standalone');
});

Route::get('ty', function () {
    return view('pages.ty');
});

Route::get('NotFound', function () {
    return view('pages.404');
});
