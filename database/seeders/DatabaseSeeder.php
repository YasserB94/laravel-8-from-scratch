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
        Post::factory(3)->create();
        Post::factory(5)->create(['user_id'=>1]);
        Post::factory(5)->create(['category_id'=>1]);
    }
}
