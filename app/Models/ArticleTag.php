<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/18
 * Time: 0:07
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ArticleTag extends Model
{
    use SoftDeletes;
    protected $table = 'article_tags';
    public function addTagIds($article_id,$tag_ids)
    {
        // 组合批量插入的数据
        $data = array_map(function ($tag) use ($article_id) {
            return [
                'article_id' => $article_id,
                'tag_id'     => $tag,
            ];
        }, $tag_ids);

        return $this->insert($data);
    }
}