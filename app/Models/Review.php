<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property string|null $img
 * @property string $authorPosition
 * @property string $authorName
 * @property string $lead
 * @property string $content
 * @property string $href
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $document_id
 * @property-read \App\Models\Document $document
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereAuthorPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['authorPosition', 'authorName', 'content', 'img', 'href', 'document_id', 'lead'];
    /**
     * @var array
     */
    protected $hidden= ['document_id'];

    /**
     * return document info
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document','document_id');
    }

    public function imgFile(){
        return $this->belongsTo('App\Models\File','img');
    }
}
