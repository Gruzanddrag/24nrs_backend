<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

/**
 * App\Models\Entry
 *
 * @property int $id
 * @property string $title
 * @property string|null $image_mob
 * @property string|null $image_des
 * @property string|null $preview
 * @property string $date
 * @property int $view_count
 * @property string $content
 * @property string $category
 * @property string $lead
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry articles()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry news()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageDes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageMob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereViewCount($value)
 * @mixin \Eloquent
 * @property int|null $image_desktop
 * @property int|null $image_mobile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageMobile($value)
 * @property string|null $mobile
 * @property int|null $desktop
 * @property-read \App\Models\File|null $desktopImg
 * @property-read \App\Models\File|null $previewImg
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereMobile($value)
 * @property int|null $theme_id
 * @property-read array $formatted_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereThemeId($value)
 */
class Entry extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['theme_id','content', 'title', 'lead', 'category','desktop','preview'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeArticles($query)
    {
        return $query->where('category', '=', 'article');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNews($query)
    {
        return $query->where('category', '=', 'news');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function previewImg() {
        return $this->belongsTo('App\Models\File','preview');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desktopImg() {
        return $this->belongsTo('App\Models\File','desktop');
    }

    /**
     * Get the formatted date
     * @return array
     */
    public function getFormattedDateAttribute()
    {
        $newDate = new Date($this->date);
        $month = $newDate->format('F');
        $month = mb_strtoupper(mb_substr($month, 0, 1)) . mb_substr($month, 1);
        return [
            'day' => $newDate->format('d'),
            'month' => $month,
            'year' => $newDate->format('Y')];
    }

    public function getDateAttribute($date){
        return (new Date($date))->format('d.m.Y');
    }
}
