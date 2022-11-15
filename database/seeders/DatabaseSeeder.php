<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Category,User,Post};

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
        //Avoid duplicates
        User::truncate();
        Category::truncate();
        Post::truncate();
        Post::factory(5)->create(['user_id'=>1,'category_id'=>4]);
        Post::factory(5)->create(['user_id'=>2,'category_id'=>2]);
        Post::factory(5)->create(['user_id'=>2,'category_id'=>4]);
        Post::factory(5)->create(['user_id'=>1,'category_id'=>3]);
        Post::factory(5)->create(['user_id'=>3,'category_id'=>3]);
        Post::factory(5)->create(['user_id'=>3,'category_id'=>2]);
    }
}
