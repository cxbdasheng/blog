<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Markdown;
use Str;

class ArticleObserver
{
    public function saving($article)
    {
        if (empty($article->description)) {
            $content = preg_replace(
                ['/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'],
                '',
                $article->markdown
            );
            $article->description = Str::substr($content, 0, 200);
        }

        if (empty($article->is_top)) {
            $article->is_top = 0;
        }

        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }
        // 转换成html
        $article->html = Markdown::convertToHtml($article->markdown);
//        $image_paths = get_image_paths_from_html($article->html);
//        foreach ($image_paths as $image_path) {
//            $image_path = public_path($image_path);
//            if (file_exists($image_path)) {
//                add_text_water($image_path, config('bjyblog.water.text'));
//            }
//        }
        if (empty($article->cover)) {
            $article->cover = $image_paths[0] ?? config('app.url') .'/uploads/article/default.jpg';
        }

    }

    public function deleted($article)
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
        } else {
            ArticleTag::where('article_id', $article->id)->delete();
        }
    }

    public function restored($article)
    {
        // 恢复删除的文章后同步恢复关联表 article_tags 中的数据
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
    }
}
