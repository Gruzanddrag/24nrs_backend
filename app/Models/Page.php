<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUrl($value)
 * @mixin \Eloquent
 * @property string $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PageEntry[] $entries
 * @property-read int|null $entries_count
 */
class Page extends Model
{
    //
    protected $fillable = ['url', 'name'];
    protected $hidden = ['entries', 'faq'];

    /**
     * Возвращает класс страницы
     * @return Page|Page[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|Model|mixed|object|null
     */
    static function currentPage($url){
        \Log::debug('page: ' . $url);
        $url = $url === "/" ? '' : $url;
        $page = self::query()->where('url', '=', '/'.$url)->first();
        if($page == null) {
            $page = self::query()->where('name', '=', 'Другая')->first();
        }
        return $page;
    }

    public function getArticles(){
        $articles = Entry::articles()
            ->leftJoin('page_entry', 'page_entry.entry_id', '=', 'entries.id')
            ->whereNotNull('page_entry.page_id')
            ->where('page_entry.page_id', $this->id)
            ->take(4)
            ->get();
        \Log::debug(print_r($articles,true));
        return $articles;
    }

    public function getNews(){
        $news = Entry::news()
            ->leftJoin('page_entry', 'page_entry.entry_id', '=', 'entries.id')
            ->whereNotNull('page_entry.page_id')
            ->where('page_entry.page_id', $this->id)
            ->take(4)
            ->get();
        return $news;
    }

    public function entries(){
        return $this->hasMany('App\Models\PageEntry', 'page_id','id');
    }

    public function faq(){
        return $this->hasMany('App\Models\PageFaq', 'page_id');
    }

    public function getVisibleFaq(){
        return FaqQuestionCategory::query()
            ->leftJoin('page_faq', 'page_faq.faq_category_id', '=', 'faq_question_categories.id')
            ->whereNotNull('page_faq.page_id')
            ->where('page_faq.page_id', $this->id);
    }

}
