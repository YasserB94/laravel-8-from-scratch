<?php

namespace Database\Factories;

use App\Models\{Category,User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'title'=>$this->faker->sentence(3),
            'slug'=>$this->faker->slug(1),
            'summary'=>$this->faker->sentence(6),
            'body'=>$this->faker->paragraph(10),
        ];
    }
}
