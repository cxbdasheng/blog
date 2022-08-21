<?php

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Schema;
use App\Models\Comment;

class V1_0_0 extends Command
{
    protected $signature = 'upgrade:v1.0.0';
    protected $description = 'Upgrade to v1.0.0';
    /**
     * @var array<int,array<string,mixed>>
     */
    private $children = [];

    public function handle(): int
    {
        if (Schema::hasTable('comment_backups') === false) {
            Schema::rename('comments', 'comment_backups');
            Schema::table('comment_backups', function (Blueprint $table) {
                $table->renameColumn('pid', 'parent_id');
            });

            Schema::create('comments', function (Blueprint $table) {
                $table->bigIncrements('id')->comment('主键id');
                $table->integer('socialite_user_id')->unsigned()->default(0)->comment('评论用户id 关联socialite_user表的id');
                $table->integer('article_id')->unsigned()->comment('文章id');
                $table->text('content')->comment('内容');
                $table->boolean('is_audited')->comment('是否已经通过审核');
                $table->nestedSet();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        $this->info('Migration comments');
        $this->call('cache:clear');
        $this->call('modelCache:clear');

        $deleted_comments = DB::table('comment_backups')
            ->whereNotNull('deleted_at')
            ->pluck('deleted_at', 'id');

        $article_ids = DB::table('comment_backups')
            ->orderBy('article_id')
            ->groupBy('article_id')
            ->pluck('article_id');

        $bar = $this->output->createProgressBar($article_ids->count());
        $bar->start();

        foreach ($article_ids as $article_id) {
            $bar->advance();
            foreach ($this->getCommentsByArticleId($article_id) as $item) {
                Comment::create($item);
            }
        }

        if ($deleted_comments->isNotEmpty()) {
            foreach ($deleted_comments as $id => $deleted_at) {
                DB::table('comment_backups')->where('id', $id)->update([
                    'deleted_at' => $deleted_at,
                ]);

                DB::table('comments')->where('id', $id)->update([
                    'deleted_at' => $deleted_at,
                ]);
            }
        }

        DB::table('comments')->where('parent_id', 0)->update([
            'parent_id' => null,
        ]);

        $bar->finish();
        $this->line('');
        $this->info('update successful!');
        return 0;
    }

    /**
     * @param int $article_id
     *
     * @return array<int,array<string,mixed>>
     */
    private function getCommentsByArticleId($article_id)
    {
        $comments = DB::table('comment_backups')
            ->select('id', 'socialite_user_id', 'parent_id', 'article_id', 'content', 'is_audited', 'created_at', 'updated_at', 'deleted_at')
            ->where('article_id', $article_id)
            ->where('parent_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $comments = $comments->map(function ($comment) {
            return (array)$comment;
        })->toArray();

        foreach ($comments as $index => $comment) {
            $this->children = [];
            $this->getTree($comment);
            $children = $this->children;

            if (!empty($children)) {
                uasort($children, function ($a, $b) {
                    $prev = $a['created_at'] ?? 0;
                    $next = $b['created_at'] ?? 0;

                    if ($prev === $next) {
                        return 0;
                    }

                    return ($prev < $next) ? -1 : 1;
                });
            }

            if ($children !== []) {
                $comments[$index]['children'] = $children;
            }
        }

        return $comments;
    }

    /**
     * @param array<string,mixed> $comment
     */
    private function getTree(array $comment): void
    {
        $children = DB::table('comment_backups')
            ->select('id', 'socialite_user_id', 'article_id', 'content', 'is_audited', 'created_at', 'updated_at', 'deleted_at')
            ->where('parent_id', $comment['id'])
            ->orderBy('created_at', 'desc')
            ->get();

        $children = $children->map(function ($comment) {
            return (array)$comment;
        })->toArray();

        foreach ($children as $child) {
            $this->children[] = $child;
            $this->getTree($child);
        }
    }
}
