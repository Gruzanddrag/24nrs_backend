<?php

Route::get('/', "ViewController@landing");

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

Route::get('landing', function () {
    return view('pages.landing');
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

Route::get('NotFound', function () {
    return view('pages.404');
});
