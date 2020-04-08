<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Articles;
class CategoryObserver extends BaseObserver
{
    public function saving(Category $category){
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }
    public function deleting($category)
    {
        if (Articles::where('category_id', $category->id)->count() !== 0) {
            push_error('请先删除分类下的文章！');
            return false;
        }
    }
}
