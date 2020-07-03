<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MobileMenuLink
 *
 * @property int $id
 * @property string $text
 * @property int $position
 * @property string|null $customUrl
 * @property int|null $parent_id
 * @property int|null $url_id
 * @property-read mixed $children
 * @property-read \App\Models\Url|null $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink whereCustomUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MobileMenuLink whereUrlId($value)
 * @mixin \Eloquent
 */
class MobileMenuLink extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['text', 'customUrl', 'url_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function url(){
        return $this->belongsTo('App\Models\Url');
    }

    public function getChildrenAttribute(){
        return self::query()->where('parent_id', '=', $this->id)->get();
    }
}
