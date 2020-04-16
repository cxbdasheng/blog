<?php

use Illuminate\Database\Seeder;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tags')->truncate();
        DB::table('article_tags')->insert([
            [
                'article_id' => 1,
                'tag_id'     => 1,
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'article_id' => 2,
                'tag_id'     => 2,
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => '2020-03-27 01:03:22',
            ],
        ]);
    }
}
