<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['content', 'title', 'lead', 'category'];

    public $timestamps = true;

    public function scopeArticles($query)
    {
        return $query->where('category', '=', 'article');
    }
    public function scopeNews($query)
    {
        return $query->where('category', '=', 'news');
    }

}
