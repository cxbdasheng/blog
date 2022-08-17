<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/12
 * Time: 23:51
 */

namespace App\Models;

use App\Models\Article;

class Praise extends BaseModel
{
    protected $table = 'praise';

    protected $fillable = ['article_id', 'ip'];

    public function Articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
