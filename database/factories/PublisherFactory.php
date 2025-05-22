<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company,
            'address' => $this->faker->optional()->streetAddress,
            'city' => $this->faker->optional()->city,
            'country' => $this->faker->optional()->country,
            'phone' => $this->faker->optional()->phoneNumber,
            'email' => $this->faker->boolean(80) ? $this->faker->unique()->companyEmail : null,
            'website' => $this->faker->optional()->url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
