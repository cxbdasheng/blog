<?php

use Illuminate\Database\Seeder;

class NavTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('navs')->truncate();

        \DB::table('navs')->insert([
            [
                'id'         => 1,
                'name'       => '时间轴',
                'url'        => '/time',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => '关于我',
                'url'        => '/about',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
        ]);
    }
}
