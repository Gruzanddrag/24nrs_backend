<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    public $timestamps = false;

    protected $fillable = ['text', 'customUrl', 'url_id'];

    public function url(){
        return $this->belongsTo('App\Models\Url');
    }
}
