<?php

namespace App\Models;

use App\Models\Article;

class Tag extends BaseModel
{
    protected $table = 'tag';
    protected $fillable = ['name', 'keywords', 'description'];
    protected $appends = [
        'url'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags', 'tag_id', 'article_id');
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];
        if (config('config.is_slug') == 'true') {
            $parameters[] = $this->slug;
        }
        return url('tag', $parameters);
    }
}
