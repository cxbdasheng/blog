<?php

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('times')->truncate();

        \DB::table('times')->insert([
            [
                'id'         => 1,
                'type'         => 1,
                'article_id'         => 0,
                'content'    => '博客从Tp5.1版本，迁移到Laravel7.0。',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'type'         => 1,
                'article_id'         => 0,
                'content'    => '已删除',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => '2020-03-27 01:03:22',
            ],
            [
                'id'         => 3,
                'type'         => 2,
                'article_id'         => 1,
                'content'    => '《欢迎使用 陈大剩博客》',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
        ]);
    }
}
