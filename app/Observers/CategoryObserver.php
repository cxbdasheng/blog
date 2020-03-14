<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    public function saving(Category $category){
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

}
