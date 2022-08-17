<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/15
 * Time: 23:12
 */

namespace App\Models;

use App\Models\Tag;
use App\Models\Praise;

class Article extends BaseModel
{
    protected $table = 'articles';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $attributes = [
        'description' => '',
    ];

    protected $appends = [
        'url'
    ];

    protected $fillable = ['category_id', 'title', 'slug', 'author', 'markdown', 'html', 'description', 'keywords', 'cover', 'views', 'is_top'];

    public function getDescriptionAttribute(string $value): string
    {
        return str_replace(["\r", "\n", "\r\n"], '', $value);
    }

    public function getHtmlAttribute(string $value): string
    {
        return $value;
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function praise()
    {
        return $this->hasMany(Praise::class, 'article_id');
    }

    public function searchArticleGetId(string $wd)
    {
        return self::where('title', 'like', "%$wd%")
            ->orWhere('description', 'like', "%$wd%")
            ->orWhere('markdown', 'like', "%$wd%")
            ->pluck('id');
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];
        if (config('config.is_slug') == 'true') {
            $parameters[] = $this->slug;
        }
        return url('article', $parameters);
    }
}
