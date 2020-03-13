<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FaqQuestion
 *
 * @property int $id
 * @property string $questionAnswer
 * @property string $question
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereQuestionAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FaqQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FaqQuestion extends Model
{
    protected $fillable = ['questionAnswer', 'question', 'category_id'];

}
