<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        DB::table('articles')->insert([
            [
                'id'          => 1,
                'category_id' => 1,
                'title'       => '欢迎使用 陈大剩博客',
                'slug'        => 'welcome-to-ChenDashengblog',
                'author'      => '陈大剩',
                'markdown'    => '欢迎使用 ChenDashengblog',
                'html'        => '<p>欢迎使用 ChenDashengblog</p>',
                'description' => '欢迎使用 ChenDashengblog',
                'keywords'    => 'Cxb,chenDasheng,陈大剩',
                'cover'       => '/img/default.png',
                'is_top'      => 1,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'category_id' => 1,
                'title'       => '已删除',
                'slug'        => 'deleted',
                'author'      => '陈大剩',
                'markdown'    => '内容',
                'html'        => '内容',
                'description' => '描述',
                'keywords'    => 'test',
                'cover'       => '/img/default.png',
                'is_top'      => 0,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => '2020-03-27 01:03:22',
            ],
            [
                'id'          => 3,
                'category_id' => 1,
                'title'       => '你已经成功安装了陈大剩博客',
                'slug'        => 'you-have-successfully-installed-chen-dazuos-blog',
                'author'      => '陈大剩',
                'markdown'    => '你已经成功安装了陈大剩博客，开使你的博客之旅把',
                'html'        => '<p>你已经成功安装了陈大剩博客，开使你的博客之旅把</p>',
                'description' => '你已经成功安装了陈大剩博客，开使你的博客之旅把',
                'keywords'    => '安装成功,陈大剩',
                'cover'       => '/img/default.png',
                'is_top'      => 0,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
        ]);
    }
}
