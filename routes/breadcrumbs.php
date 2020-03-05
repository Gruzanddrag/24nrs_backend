<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home page
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Группа компаний ЭКСПЕРТИЗА', route('home'));
});
//services page
Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('services'));
});
// articles
Breadcrumbs::for('articles', function ($trail) {
    $trail->parent('home');
    $trail->push('Статьи', route('articles'));
});

Breadcrumbs::for('article', function ($trail, $id) {
    $trail->parent('articles');
    $entry = \App\Models\Entry::find($id);
    $trail->push($entry->title, route('article', $id));
});

// news
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news'));
});

Breadcrumbs::for('single-news', function ($trail, $id) {
    $trail->parent('news');
    $news = \App\Models\Entry::find($id);
    $trail->push($news->title, route('single-news', $id));
});
// review
Breadcrumbs::for('review', function ($trail, $id) {
    $trail->parent('home');
    $review = \App\Models\Review::find($id);
    $trail->push($review->lead, route('review', $id));
});
// contacts
Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts'));
});
// faq
Breadcrumbs::for('faq', function ($trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});