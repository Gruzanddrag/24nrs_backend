<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileMenuLink extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['text', 'customUrl', 'url_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function url(){
        return $this->belongsTo('App\Models\Url');
    }

    public function getChildrenAttribute(){
        \Log::debug($this->id);
        return self::query()->where('parent_id', '=', $this->id)->get();
    }
}
