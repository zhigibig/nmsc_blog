<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug,
            'text' => $this->faker->paragraphs(asText: true),
            'image' => $this->faker->imageUrl(640, 480, 'cats'),
            'views' => $this->faker->numberBetween(0, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
