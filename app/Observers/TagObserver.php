<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\ArticleTag;
use Artisan;

class TagObserver extends BaseObserver
{

    public function created($tag): void
    {
        Artisan::queue('generate-sitemap');
    }

    public function saving($tag): void
    {
        if (($tag->slug === null || $tag->slug === '') && $tag->isDirty('name')) {
            $tag->slug = generate_english_slug($tag->name);
        }
    }

    public function deleting($tag): void
    {
        if (ArticleTag::where('tag_id', $tag->id)->count() !== 0) {
            abort(403, translate('Please delete articles with this tags first'));
        }
    }

    public function deleted($tag): void
    {
        if (!$tag->isForceDeleting()) {
            Artisan::queue('generate-sitemap');
        }
    }

}
