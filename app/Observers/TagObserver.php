<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\ArticleTag;
class TagObserver extends BaseObserver
{
    public function saving(Tag $category){
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }
    public function deleting($tag)
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            push_error('请先删除标签下的文章！');
            return false;
        }
    }

}
