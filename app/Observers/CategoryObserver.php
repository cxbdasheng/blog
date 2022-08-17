<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Article;
class CategoryObserver extends BaseObserver
{
    public function saving(Category $category){
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
        if (empty($category->sort) || !is_numeric($category->sort)) {
            $category->sort = 0;
        }
    }
    public function deleting($category)
    {
        if (Article::where('category_id', $category->id)->count() !== 0) {
            push_error('请先删除分类下的文章！');
            return false;
        }
    }
}
