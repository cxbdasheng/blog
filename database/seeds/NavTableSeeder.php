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
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
        ]);
    }
}
