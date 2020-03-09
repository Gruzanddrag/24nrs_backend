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
 * @property int $id
 * @property string $FIO
 * @property string $phone
 * @property string $date
 * @property string $time
 * @property string $ip
 * @property string $region
 * @property string $town
 * @property string $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereFIO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUsForm whereUpdatedAt($value)
 */
class ContactUsForm extends Model
{
    protected $fillable = ['FIO', 'phone', 'position'];
}
