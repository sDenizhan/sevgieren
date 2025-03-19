<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
        $title = $this->faker->sentence;
        $category = PostCategory::inRandomOrder()->first();
        $images = ['360x286-img1.jpg', '360x286-img2.jpg', '360x286-img3.jpg', '360x286-img4.jpg', '360x286-img5.jpg', '360x286-img6.jpg'];
        $image = $images[random_int(0, 5)];
        return [
            'title' => $title,
            'category_id' => $category->id,
            'content' => $this->faker->paragraph(6),
            'slug' => Str::slug($title),
            'image' => $image,
            'status' => 1,
            'seo' => [
                'title' => $title,
                'description' => $this->faker->paragraph(2),
                'meta_tags' => null
            ]
        ];
    }
}
