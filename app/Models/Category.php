<?php

namespace App\Models;

use Str;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $fillable = ['name', 'keywords', 'description', 'sort'];
    protected $appends = [
        'url'
    ];

    public function articles()
    {
        return $this->hasOne(Article::class);
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];
        if (config('config.is_slug') == 'true') {
            $parameters[] = $this->slug;
        }
        return url('category', $parameters);
    }
}
