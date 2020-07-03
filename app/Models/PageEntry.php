<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PageEntry
 *
 * @property int $id
 * @property int|null $entry_id
 * @property int|null $page_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Entry $entry
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry whereEntryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageEntry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageEntry extends Model
{
    protected $table = 'page_entry';

    public function entry(){
        return $this->hasOne('App\Models\Entry','id','entry_id');
    }

    public function pages(){
        return $this->hasMany('App\Models\Page','page_id');
    }
}
