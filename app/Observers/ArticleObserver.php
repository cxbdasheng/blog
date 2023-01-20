<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleTag;
use Str;
use App\Models\Time;
use Artisan;

class ArticleObserver extends BaseObserver
{
    public function created($model)
    {
        \DB::table('times')->insert(['content' => '《' . $model->title . '》', 'article_id' => $model->id, 'type' => '2', 'created_at' => date("Y:m:d H:s:i"), 'updated_at' => date("Y:m:d H:s:i")]);
        Artisan::queue('generate-sitemap');
        push_baidu_urls([url('article', $model->id)]);
    }

    public function creating($article): void
    {
        if ($article->description === '') {
            $content = preg_replace(
                ['/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'],
                '',
                $article->markdown
            );

            assert(is_string($content));

            if (config('app.locale') === 'zh-CN') {
                $article->description = Str::substr($content, 0, 200);
            } else {
                $article->description = Str::words($content, 30, '');
            }
        }
    }

    public function saving($article)
    {
        if (empty($article->is_top)) {
            $article->is_top = 0;
        }
        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }
        $image_paths = get_image_paths_from_html($article->html);
        if (empty($article->cover)) {
            $article->cover = $image_paths[0] ?? get_default_img();
        }
    }

    public function updated($model)
    {
        if ($model->isDirty()) {
            \DB::table('times')->where('article_id', $model->id)->update(['content' => '《' . $model->title . '》', 'updated_at' => date("Y:m:d H:s:i")]);
            push_success('更新成功！');
        } else {
            push_error('没有任何更新！');
        }
    }

    public function deleted($article)
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
            \DB::table('times')->where('article_id', $article->id)->delete();
            push_success('彻底删除成功！');
        } else {
            ArticleTag::where('article_id', $article->id)->delete();
            \DB::table('times')->where('article_id', $article->id)->update(['deleted_at' => date("Y:m:d H:s:i")]);
            push_success('删除成功！');
        }
    }

    public function restored($article)
    {
        // 恢复删除的文章后同步恢复关联表 article_tags 中的数据
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
        \DB::table('times')->where('article_id', $article->id)->update(['deleted_at' => null]);
        push_success('恢复成功！');
    }
}
