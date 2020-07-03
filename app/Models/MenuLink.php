<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuLink
 *
 * @property int $id
 * @property string $text
 * @property string|null $customUrl
 * @property int $position
 * @property int|null $url_id
 * @property-read \App\Models\Url|null $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink whereCustomUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuLink whereUrlId($value)
 * @mixin \Eloquent
 */
class MenuLink extends Model
{
    public $timestamps = false;

    protected $fillable = ['text', 'customUrl', 'url_id'];

    public function url(){
        return $this->belongsTo('App\Models\Url');
    }
}
