<?php

use Illuminate\Database\Seeder;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->truncate();
        DB::table('tag')->insert([
            [
                'id'          => 1,
                'name'        => 'laravel',
                'slug'        => 'laravel',
                'keywords'    => 'laravel',
                'description' => 'Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。',
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'name'        => 'test',
                'slug'        => 'test',
                'keywords'    => 'test',
                'description' => '测试描述',
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
            [
                'id'          => 3,
                'name'        => '已删除',
                'slug'        => 'deleted',
                'keywords'    => 'delete',
                'description' => '删除的标签',
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => '2020-03-27 01:03:22',
            ],
        ]);
    }
}
