<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FaqQuestionCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FaqQuestion[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestionCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FaqQuestionCategory extends Model
{
    protected $fillable = ['name'];

    public function questions(){
        return $this->hasMany('App\Models\FaqQuestion','category_id');
    }
}
