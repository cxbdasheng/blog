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
                'content'    => '技术这东西；懂的越多；不懂的就越多；',
                'created_at' => '2017-7-18 07:35:12',
                'updated_at' => '2016-7-18 07:35:12',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'type'         => 1,
                'article_id'         => 0,
                'content'    => '已删除',
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => '2019-01-04 16:35:12',
            ],
            [
                'id'         => 3,
                'type'         => 2,
                'article_id'         => 1,
                'content'    => '《欢迎使用blog》',
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => null,
            ],
        ]);
    }
}
