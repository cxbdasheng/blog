<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \DB::table('users')->insert([
            [
                'id'             => 1,
                'name'           => 'test',
                'email'          => 'test@test.com',
                'password'       => bcrypt(123456),
                'remember_token' => null,
                'created_at'     => '2016-10-22 07:35:12',
                'updated_at'     => '2016-10-22 07:35:12',
                'deleted_at'     => null,
            ],
            [
                'id'             => 2,
                'name'           => '已删除',
                'email'          => 'deleted@test.com',
                'password'       => bcrypt(123456),
                'remember_token' => null,
                'created_at'     => '2019-01-04 15:35:12',
                'updated_at'     => '2016-01-04 15:35:12',
                'deleted_at'     => '2016-01-04 15:35:12',
            ],
        ]);
    }
}
