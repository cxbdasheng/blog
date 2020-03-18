<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Model
{
    use SoftDeletes;
    protected $table = 'article_tags';
    protected $fillable = ['article_id', 'tag_id'];
    public function addTagIds($article_id, $tag_ids)
    {
        // 组合批量插入的数据
        $data = array_map(function ($tag) use ($article_id) {
            return [
                'article_id' => $article_id,
                'tag_id' => $tag,
                'created_at' => date('Y-m-d H:s:i'),
                'updated_at' => date('Y-m-d H:s:i'),
            ];
        }, $tag_ids);

        return self::insert($data);
    }
}

