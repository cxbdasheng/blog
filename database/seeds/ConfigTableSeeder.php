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
                'value' => '/favicon.ico',
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
            [
                'id' => 207,
                'name' => 'config.login.type',
                'value' => 'text',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 208,
                'name' => 'config.login.value',
                'value' => '陈大剩博客',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 209,
                'name' => 'config.author',
                'value' => '陈大剩',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 210,
                'name' => 'config.icp',
                'value' => '湘ICP备17009938号',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 211,
                'name' => 'config.water.text',
                'value' => '陈大剩博客',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 212,
                'name' => 'config.water.size',
                'value' => '15',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 213,
                'name' => 'config.water.color',
                'value' => '#008CBA',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 214,
                'name' => 'config.statistics',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 215,
                'name' => 'config.mate',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 216,
                'name' => 'config.link_type',
                'value' => '_self',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
        ]);
    }
}