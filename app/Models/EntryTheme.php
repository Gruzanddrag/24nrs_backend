<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EntryTheme
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EntryTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EntryTheme extends Model
{
    protected $fillable = ['text'];
}
