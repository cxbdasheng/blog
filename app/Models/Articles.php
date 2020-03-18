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

class Articles extends Model
{
    use SoftDeletes;
//    use Cachable;
    protected $table = 'articles';
    protected $fillable = ['category_id', 'title', 'slug', 'author','markdown','html','description','keywords','cover','views','is_top'];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
}
