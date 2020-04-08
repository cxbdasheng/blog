<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Str;

class Category extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'categories';
    protected $fillable = ['name', 'keywords', 'description', 'sort'];
    protected $appends = [
        'url'
    ];
    public function articles()
    {
        return $this->hasOne(Articles::class);
    }
    public function getUrlAttribute()
    {
        $parameters = [$this->id];
        if (config('config.is_slug')=='true') {
            $parameters[] = $this->slug;
        }
        return url('category', $parameters);
    }
}
