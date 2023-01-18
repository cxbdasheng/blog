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
        $this->comment('========= start migrate =========');
        $this->error("========= 迁移旧域名为：{$oldDomainName} =========");
        $this->error("========= 迁移旧域名为：{$newDomainName} =========");
        $i = 0;
        Article::where('cover', 'like', $oldDomainName . '%')->chunk(100, function ($articles) use ($oldDomainName, $newDomainName, $i) {
            foreach ($articles as $article) {
                $oldCover = $article->cover;
                $newCover = str_replace($oldDomainName, $newDomainName, $oldCover);
                $article->cover = $newCover;
                $article->save();
                $i++;
                $this->comment("========= 已成功迁移 {$i} 条数据 =========");
            }
        });
        $this->comment('========= end migrate =========');
        return 0;
    }
}
