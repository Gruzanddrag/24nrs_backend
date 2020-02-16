<?php

namespace App\Http\Controllers;

use App\Http\Resources\Entry\EntryCollection;
use App\Http\Resources\Review\ReviewCollection;
use App\Models\Entry;
use App\Models\Review;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Лэндинг
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\ViewF
     */
    public function landing() {
        return view('pages.index',[
            'news' =>  new EntryCollection(Entry::news()->take(4)->get()),
            'articles' => new EntryCollection(Entry::articles()->take(4)->get()),
            'reviews' => new ReviewCollection(Review::all())
        ]);
    }

    /**
     * Вывод статьи
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id) {
        $e = Entry::find($id);
        $e->desktop;
        $e->increment('view_count');
        return view('pages.article', [
            'ent' => $e
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function articles() {
        return view('pages.articles', [
            'articles' => EntryResource::collection(Entry::articles()->get())
        ]);
    }

    function review($id){
        $review = Review::find($id);
        $review->document;
        $review->document->documentFile;
        return view('pages.review',[
           'review' => $review
        ]);
    }
}
