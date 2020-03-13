<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserChecked
 *
 * @property int $id
 * @property int $user_id
 * @property int $last_check_CUF
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked whereLastCheckCUF($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserChecked whereUserId($value)
 * @mixin \Eloquent
 */
class UserChecked extends Model
{
    protected $table = 'user_checked';
    public $timestamps = false;
    protected $fillable = ['last_check_CUF'];
}
