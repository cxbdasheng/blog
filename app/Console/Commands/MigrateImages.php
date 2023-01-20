<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Schema;

class MigrateImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change the article image domain name。Note: Additional image file migration is required';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $oldDomainName = $this->ask('Please enter the old domain name？');
        $newDomainName = $this->ask('Please enter the new domain name？');
        $this->comment('========= Start migrate =========');
        $this->error("========= Migrate the old domain name：{$oldDomainName} =========");
        $this->error("========= Migrate the new domain name：：{$newDomainName} =========");
        $i = 0;
        Article::withTrashed()->chunk(100, function ($articles) use ($oldDomainName, $newDomainName, $i) {
            foreach ($articles as $article) {
                $oldCover = $article->cover;
                $newCover = str_replace($oldDomainName, $newDomainName, $oldCover);

                $oldHtml = $article->html;
                $newHtml = str_replace($oldDomainName, $newDomainName, $oldHtml);

                $oldMarkdown = $article->markdown;
                $newMarkdown = str_replace($oldDomainName, $newDomainName, $oldMarkdown);
                if ($newCover != $article->cover || $newHtml != $article->html || $newMarkdown != $article->markdown) {
                    $article->cover = $newCover;
                    $article->html = $newHtml;
                    $article->markdown = $newMarkdown;
                    $article->save();
                    $i++;
                    $this->comment("=========  {$i} pieces of data have been migrated.  =========");
                }
            }
        });
        $this->comment('========= End migrate =========');
        return 0;
    }
}
