<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Random birth and optional death date (death after birth)
        $birthDate = $this->faker->date('Y-m-d', '-30 years');
        // $deathDate = $this->faker->optional(0.3)->dateTimeBetween($birthDate, 'now')->format('Y-m-d');
        $maybeDeathDate = $this->faker->optional(0.3)->dateTimeBetween($birthDate, 'now');

        $deathDate = $maybeDeathDate ? $maybeDeathDate->format('Y-m-d') : null;

        return [
            'name' => $this->faker->name,
            'nationality' => $this->faker->country,
            'birth_date' => $birthDate,
            'death_date' => $deathDate,
            'biography' => $this->faker->optional()->paragraphs(3, true),
            'photo' => $this->faker->optional()->imageUrl(300, 400, 'people', true, 'author'),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
