<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Article;
use Artisan;

class CategoryObserver extends BaseObserver
{
    public function created($category): void
    {
        Artisan::queue('generate-sitemap');
    }

    public function saving($category): void
    {
        if ($category->isDirty('name') && empty($category->slug)) {
            $category->slug = generate_english_slug($category->name);
        }
    }

    public function deleting($category): void
    {
        if (Article::where('category_id', $category->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this category first'));
        }
    }

    public function deleted($category): void
    {
        if (!$category->isForceDeleting()) {
            Artisan::queue('generate-sitemap');
        }
    }
}
