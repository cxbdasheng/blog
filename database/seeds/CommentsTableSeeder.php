<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'id'                => 1,
                'socialite_user_id' => 1,
                'type'              => 1,
                'pid'               => 0,
                'article_id'        => 1,
                'content'           => '评论的内容',
                'is_audited'        => 1,
                'created_at'        => '2020-03-27 01:03:22',
                'updated_at'        => '2020-03-27 01:03:22',
                'deleted_at'        => null,
            ],
            [
                'id'                => 2,
                'socialite_user_id' => 1,
                'type'              => 1,
                'pid'               => 0,
                'article_id'        => 1,
                'content'           => '已删除',
                'is_audited'        => 1,
                'created_at'        => '2020-03-27 01:03:22',
                'updated_at'        => '2020-03-27 01:03:22',
                'deleted_at'        => '2020-03-27 01:03:22',
            ],
        ]);
    }
}
