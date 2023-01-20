<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Category;
use App\Models\Nav;
use App\Models\Tag;
use Carbon\CarbonInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use File;
use DateTime;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating the sitemap';

    public function handle(): int
    {
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

        $url_block = '';

        foreach ($articles as $article) {
            /** @var \App\Models\Article $article */
            $url_block .= $this->generateUrl(url('article', $article->id), $article->updated_at);
        }

        foreach ($categories as $category) {
            /** @var \App\Models\Category $category */
            $url_block .= $this->generateUrl(url('category', $category->id), $category->updated_at);
        }

        foreach ($tags as $tag) {
            /** @var \App\Models\Tag $tag */
            $url_block .= $this->generateUrl(url('tag', $tag->id), $tag->updated_at);
        }

        foreach ($navs as $nav) {
            /** @var \App\Models\Nav $nav */
            $url_block .= $this->generateUrl(url('nav', $nav->id), $nav->updated_at);
        }

        File::put(public_path('sitemap.xml'), str_replace('{url_block}', rtrim($url_block), rtrim(File::get(app_path('Console/Commands/Stubs/sitemap.stub')))));

        $this->info('Generating the sitemap completed.');
        $this->info('Path: ' . public_path('sitemap.xml'));

        return 0;
    }

    private function generateUrl(string $url, ?CarbonInterface $carbo): string
    {
        $date = $carbo === null ? Date::now()->format(DateTime::ATOM) : $carbo->format(DateTime::ATOM);
        return str_replace(['{url}', '{date}'], [$url, $date], File::get(app_path('Console/Commands/Stubs/sitemap-url.stub')));
    }
}
