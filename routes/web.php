<?php

Route::get('/', "ViewController@main")->name('home');

Route::get('article/{id}',"ViewController@article")->name('article');


Route::get('articles',"ViewController@articles")->name('articles');

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

Route::get('services', "ViewController@services")->name('services');

Route::get('ty', function () {
    return view('pages.ty');
});

Route::prefix('faq')->group(function(){
    Route::get('/', "ViewController@faq");
    Route::post('/ty', function (){
        return view('pages.faq-ty');
    });
});

Route::get('NotFound', function () {
    return view('pages.404');
});
