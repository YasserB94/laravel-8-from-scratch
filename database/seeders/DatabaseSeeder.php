<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Category, User, Post};

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

        $posts = 100;
        $categories = 8;
        $users = 12;
        Category::factory($categories)->create();
        User::factory($users)->create();

        for($i=0;$i<$posts;$i++){
            Post::factory(1)->create(['user_id' => rand(1,$users),'category_id' => rand(1,$categories)]);
        }

    }
}
