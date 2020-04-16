<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->truncate();
        DB::table('links')->insert([
            [
                'id'         => 1,
                'name'       => '陈大剩博客',
                'url'        => 'http://c69p.com',
                'sort'       => 1,
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => '已删除',
                'url'        => 'http://deleted.com',
                'sort'       => 2,
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => '2018-08-04 12:41:26',
            ],
        ]);

    }
}
