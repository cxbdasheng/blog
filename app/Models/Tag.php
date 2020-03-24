<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use App\Models\Articles;
class Tag extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'tag';
    protected $fillable = ['name', 'keywords', 'description'];

    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'article_tags','tag_id','article_id');
    }
}
