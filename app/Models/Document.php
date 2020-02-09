<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $preview
 * @property string $title
 * @property string $extension
 * @property string|null $text
 * @property string $document
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Document extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['text', 'title', 'extension', 'document'];

    public $timestamps = true;
}
