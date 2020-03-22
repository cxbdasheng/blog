<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/15
 * Time: 23:12
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use App\Models\Tag;
use Str;
class Articles extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'articles';
    protected $fillable = ['category_id', 'title', 'slug', 'author','markdown','html','description','keywords','cover','views','is_top'];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function tags()
    {
            return $this->belongsToMany(Tag::class, 'article_tags','article_id','tag_id');
    }
    public function searchArticleGetId(string $wd){
        return self::where('title', 'like', "%$wd%")
            ->orWhere('description', 'like', "%$wd%")
            ->orWhere('markdown', 'like', "%$wd%")
            ->pluck('id');
    }
}
