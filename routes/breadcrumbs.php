<?php

// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Группа компаний ЭКСПЕРТИЗА', route('home'));
});

Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('services'));
});

Breadcrumbs::for('articles', function ($trail) {
    $trail->parent('home');
    $trail->push('Статьи', route('articles'));
});

Breadcrumbs::for('article', function ($trail, $id) {
    $trail->parent('articles');
    $entry = \App\Models\Entry::find($id);
    $trail->push($entry->title, route('article', $id));
});
