<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Category;
use App\Models\Nav;
use App\Models\Tag;
use Illuminate\Console\Command;
use App\Support\BaiduPushApi;

class PushBaiduSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push-baidu-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'push baidu urls';

    public function handle(): int
    {
        $baiduPushApi = app()->make(BaiduPushApi::class);
        if (!$baiduPushApi->isOpen()) {
            $this->error('Please enter the push address');
            return 0;
        }
        $articles = Article::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $categories = Category::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $tags = Tag::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();

        $navs = Nav::select('id', 'updated_at')
            ->latest('updated_at')
            ->get();
        $urls = [];

        foreach ($articles as $article) {
            $urls[] = url('article', $article->id);
        }
        foreach ($categories as $category) {

            $urls[] = url('category', $category->id);
        }
        foreach ($tags as $tag) {
            $urls[] = url('tag', $tag->id);
        }
        foreach ($navs as $nav) {
            $urls[] = url('nav', $nav->id);
        }
        $res = $baiduPushApi->push($urls);
        if ($res) {
            $this->info('Successful push ' . count($urls) . ' number');
            return 0;
        }
        $this->error('Push failure');
        return 0;
    }
}
