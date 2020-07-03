<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Url
 *
 * @property int $id
 * @property string $url
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Url whereUrl($value)
 * @mixin \Eloquent
 */
class Url extends Model
{
    public $timestamps = false;
}
