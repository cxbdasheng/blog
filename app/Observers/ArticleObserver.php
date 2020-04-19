<?php

namespace App\Observers;

use App\Models\ArticleTag;
use Markdown;
use Str;
use App\Models\Time;
class ArticleObserver extends BaseObserver
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
        // XSS 过滤
        $article->description = clean($article->description);
        if ($article->isDirty('title') && empty($article->slug)) {
            $article->slug = generate_english_slug($article->title);
        }
        // 转换成html
        $article->html = Markdown::convertToHtml($article->markdown);

        $image_paths = get_image_paths_from_html($article->html);
        foreach ($image_paths as $image_path) {
            $image_path=str_replace(config('app.url'),'',$image_path);
            $image_path = public_path($image_path);
            if (file_exists($image_path)) {
                add_text_water($image_path, config('config.water.text'),config('config.water.color'));
            }
        }
        if (empty($article->cover)) {
            $article->cover = $image_paths[0] ?? config('app.url') .'/img/default.png';
        }
    }
    public function created($model)
    {
        \DB::table('times')->insert(['content'=>'《'.$model->title .'》','article_id'=>$model->id,'type'=>'2','created_at'=>date("Y:m:d H:s:i"),'updated_at'=>date("Y:m:d H:s:i")]);
        push_success('添加成功！');
    }
    public function updated($model)
    {
        if($model->isDirty()){
            \DB::table('times')->where('article_id',$model->id)->update(['content'=>'《'.$model->title .'》','updated_at'=>date("Y:m:d H:s:i")]);
            push_success('更新成功！');
        }else{
            push_error('没有任何更新！');
        }
    }
    public function deleted($article)
    {
        // 删除文章后同步删除关联表 article_tags 中的数据
        if ($article->isForceDeleting()) {
            ArticleTag::onlyTrashed()->where('article_id', $article->id)->forceDelete();
            \DB::table('times')->where('article_id',$article->id)->delete();
            push_success('彻底删除成功！');
        } else {
            ArticleTag::where('article_id', $article->id)->delete();
            \DB::table('times')->where('article_id',$article->id)->update(['deleted_at'=>date("Y:m:d H:s:i")]);
            push_success('删除成功！');
        }
    }

    public function restored($article)
    {
        // 恢复删除的文章后同步恢复关联表 article_tags 中的数据
        ArticleTag::onlyTrashed()->where('article_id', $article->id)->restore();
        \DB::table('times')->where('article_id',$article->id)->update(['deleted_at'=>null]);
        push_success('恢复成功！');
    }
}
