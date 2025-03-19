<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $category = ProductCategory::inRandomOrder()->first();
        $images = ['360x286-img1.jpg', '360x286-img2.jpg', '360x286-img3.jpg', '360x286-img4.jpg', '360x286-img5.jpg', '360x286-img6.jpg'];
        $image = $images[random_int(0, 5)];
        return [
            'category_id' => $category->id,
            'count' => 25,
            'title' => $title,
            'description' => $this->faker->paragraph(25),
            'slug' => Str::slug($title),
            'featured_image' => $image,
            'url' => $this->faker->url(),
            'price' => random_int(0, 999),
            'data' => [],
            'gallery' => $images,
            'seo' => [
                'title' => $title,
                'description' => $this->faker->paragraph(2),
                'meta_tags' => null
            ]
        ];
    }
}
