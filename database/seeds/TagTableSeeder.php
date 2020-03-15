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
        $replies = factory(\App\Models\Tag::class,100)->create();
    }
}
