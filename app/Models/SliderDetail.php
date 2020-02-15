<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SliderDetail
 *
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $lead
 * @property string $href
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $slider_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $hrefText
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereHrefText($value)
 */
class SliderDetail extends Model
{
    protected $fillable = ['title', 'lead', 'href', 'slider_id'];
}
