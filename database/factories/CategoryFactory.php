<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cat = $this->faker->unique()->word();
        return [
            //
            'name'=>$cat,
            'slug'=>preg_replace('/\s+/', '-', $cat)//Replace spaces with dashes
        ];
    }
}
