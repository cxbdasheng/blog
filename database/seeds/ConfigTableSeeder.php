<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('configs')->truncate();
        \DB::table('configs')->insert([
            [
                'id' => 201,
                'name' => 'app.name',
                'value' => '陈大剩博客',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 202,
                'name' => 'config.head.title',
                'value' => '陈大剩博客',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 203,
                'name' => 'config.head.keywords',
                'value' => 'Cxb,php全栈成长之路,陈大剩博客,php程序员,全栈成长之路',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 204,
                'name' => 'config.head.description',
                'value' => '一位正在努力的程序员,记录自己的成长之路！php全栈成长之路,陈大剩博客',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 205,
                'name' => 'config.head.icon',
                'value' => '/public/favicon.ico',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 206,
                'name' => 'config.is_slug',
                'value' => 'true',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
        ]);
    }
}