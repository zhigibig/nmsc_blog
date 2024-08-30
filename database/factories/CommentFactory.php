<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'title' => substr($this->faker->sentence, 0, 64),
            'text' => substr($this->faker->paragraphs(10, true), 0, 2048)
        ];
    }
}
