<?php

namespace App\Observers;

use App\Models\Tag;

class TagObserver
{
    public function saving(Tag $category){
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

}
