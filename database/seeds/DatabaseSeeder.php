<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(TagTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(ConfigTableSeeder::class);
         $this->call(NavTableSeeder::class);
         $this->call(TimeTableSeeder::class);
         $this->call(LinkTableSeeder::class);
         $this->call(ArticleTagsTableSeeder::class);
         $this->call(SocialiteClientsTableSeeder::class);
         $this->call(SocialiteUsersTableSeeder::class);
         $this->call(CommentsTableSeeder::class);
    }
}
