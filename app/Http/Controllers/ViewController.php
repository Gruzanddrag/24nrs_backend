<?php

namespace App\Http\Controllers;

use App\Http\Resources\Entry\EntryCollection;
use App\Http\Resources\Review\ReviewCollection;
use App\Models\Entry;
use App\Models\FaqQuestion;
use App\Models\FaqQuestionCategory;
use App\Models\Review;
use App\Models\Slider;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Builder;

class ViewController extends Controller
{

    public function __construct()
    {
        // add breadcrumbs to views
        View::share('breadcrumbs', Breadcrumbs::generate());
    }

    /**
     * Displays main page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\ViewF
     */
    public function main() {
        $slider = Slider::clientIdIs('landing1')->with('details.imgFile')->first()->toArray();
        return view('pages.index',[
            'news' =>  new EntryCollection(Entry::news()->take(4)->get()),
            'landingSlider1' => $slider['details'],
            'articles' => new EntryCollection(Entry::articles()->take(4)->get()),
            'reviews' => new ReviewCollection(Review::all()),
            'active_link' => 'Главная'
        ]);
    }

    /**
     * Displays bankguaranties
     */
    public function bankguaranties(){
        return view('pages.bankguaranties',[
            'news' =>  new EntryCollection(Entry::news()->take(4)->get()),
            'articles' => new EntryCollection(Entry::articles()->take(4)->get()),
            'reviews' => new ReviewCollection(Review::all())
        ]);
    }

    /**
     * Displays landing
     */
    public function landing(){
        return view('pages.landing',[
            'news' =>  new EntryCollection(Entry::news()->take(4)->get()),
            'articles' => new EntryCollection(Entry::articles()->take(4)->get()),
            'reviews' => new ReviewCollection(Review::all())
        ]);
    }

    /**
     * Displays landing faq searching
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function landingFaq(Request $request){
        $question = $request->query('question','');
        $questions = FaqQuestion::take(3);
        if($question){
            $questions->where('question','like',"%$question%");
        }
        $returnHTML = view('partials.faq.landing-faq',[
            'questions' => $questions->get(),
            'href' => "/faq?question=$question"
        ])->render();
        return response($returnHTML);
    }


    /**
     * Displays landing
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function mainFaq(Request $request){
        $question = $request->query('question','');
        $questions = FaqQuestionCategory::with(['questions' => function($q){
            $q->where('question','like','%'.$_GET['question'].'%');
        }])->whereHas('questions',  function($q){
            $q->where('question','like','%'.$_GET['question'].'%');
        });
        $returnHTML = view('partials.faq.main-faq',[
            'categories' => $questions->get()->count() > 0  ? $questions->get() : false,
            'href' => "/faq?question=$question",
            'question' => $question
        ])->render();
        return response($returnHTML);
    }
    /**
     * show article
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id) {
        $e = Entry::find($id);
        $others = Entry::with(['previewImg'])
            ->where('id','!=', $e->id)
            ->take(3);
        if(!isset($e->theme_id)) {
            $others->whereNull('theme_id');
        } else {
            $others->where('theme_id', $e->theme_id);
        }
        $e->desktop;
        $e->increment('view_count');
        return view('pages.article', [
            'ent' => $e,
            'others' => $others->get()
        ]);
    }


    /**
     * show faq page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function faq(Request $request) {
        $question = $request->query('question','');
        return view('pages.faq', [
            'question' => $question,
        ]);
    }

    /**
     * show review
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function review($id){
        $review = Review::find($id);
        $review->document;
        $review->document->documentFile;
        return view('pages.review',[
            'review' => $review,
            // 'others' => Review::with(['imgFile'])->where('id', '!=', $id)->take(3)->get()
        ]);
    }

    /**
     * show services page
     */
    public function services(){
        return view('pages.services');
    }

    /**
     * show news page
     */
    public function news(){
        $news = Entry::news()->with('previewImg')->paginate(6);
        return view('pages.news', [
            'news' => $news,
        ]);
    }


    /**
     * show services page
     */
    public function articles(){
        $articles = Entry::articles()->with('previewImg')->paginate(8);
        return view('pages.articles', [
            'articles' => $articles,
        ]);
    }
    /**
     * show contacts page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts(){
        return view('pages.contacts',[
            'active_link' => 'Контакты'
        ]);
    }
}
