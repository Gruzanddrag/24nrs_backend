<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PageFaq
 *
 * @property int $id
 * @property int|null $faq_category_id
 * @property int|null $page_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FaqQuestionCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq whereFaqCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageFaq whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageFaq extends Model
{
    protected $table = 'page_faq';

    public function category() {
        return $this->hasOne('App\Models\FaqQuestionCategory','id','faq_category_id');
    }

    public function pages() {
        return $this->hasMany('App\Models\Page','page_id');
    }
}
