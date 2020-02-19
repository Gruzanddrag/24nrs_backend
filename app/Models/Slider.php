<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $slider_name
 * @property string $slider_position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereSliderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereSliderPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string $position
 * @property string|null $img
 * @property string $clientId
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SliderDetail[] $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider wherePosition($value)
 */
class Slider extends Model
{
    protected $fillable = ['name', 'position'];



    public function details()
    {
        return $this->hasMany('App\Models\SliderDetail');
    }
}
