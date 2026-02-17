<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'article-'.rand(1,2).'.jpg',
            'name' => $this->faker->text(50),
            'annotation' => $this->faker->text(100),
            'text' => $this->faker->text(3000),
            'rating' => $this->faker->numberBetween(1,100),
            'active' => 1,
            'chapter_id' => Chapter::all()->random()->id,
        ];
    }
}
