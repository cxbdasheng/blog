<?php

use Illuminate\Database\Seeder;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'id'          => 1,
                'name'        => 'php',
                'slug'        => 'php',
                'keywords'    => 'php',
                'description' => 'php相关的文章',
                'sort'        => 1,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'name'        => '用于删除',
                'slug'        => 'for-deletion',
                'keywords'    => '用于删除',
                'description' => '用于删除',
                'sort'        => 2,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => null,
            ],
            [
                'id'          => 3,
                'name'        => '已删除',
                'slug'        => 'deleted',
                'keywords'    => '已删除',
                'description' => '已删除',
                'sort'        => 3,
                'created_at'  => '2020-03-27 01:03:22',
                'updated_at'  => '2020-03-27 01:03:22',
                'deleted_at'  => '2020-03-27 01:03:22',
            ],
        ]);
    }
}
