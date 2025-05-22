<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'isbn' => $this->faker->unique()->isbn13,
            'author_id' => \App\Models\Author::inRandomOrder()->first()?->id ?? \App\Models\Author::factory(),
            'publisher_id' => \App\Models\Publisher::inRandomOrder()->first()?->id ?? \App\Models\Publisher::factory(),
            'category_id' => \App\Models\Category::inRandomOrder()->first()?->id ?? \App\Models\Category::factory(),
            'publication_year' => $this->faker->year,
            'quantity' => $this->faker->numberBetween(1, 50),
            'description' => $this->faker->optional()->paragraphs(2, true),
            'cover_image' => $this->faker->optional()->imageUrl(300, 450, 'books', true, 'cover'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
