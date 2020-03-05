<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContactUsForm
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm query()
 * @mixin \Eloquent
 */
class ContactUsForm extends Model
{
    protected $fillable = ['FIO', 'phone', 'position'];
}
