<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostCategory>
 */
class PostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text(15);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'seo' => [
                'title' => $name,
                'description' => $this->faker->paragraph(4)
            ]
        ];
    }
}
