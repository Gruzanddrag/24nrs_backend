<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['text', 'title', 'extension', 'document'];

    public $timestamps = true;
}
