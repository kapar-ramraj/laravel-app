<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookLoan>
 */
class BookLoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $loanDate = $this->faker->dateTimeBetween('-6 months', 'now');
        $dueDate = (clone $loanDate)->modify('+14 days');

        $status = $this->faker->randomElement(['borrowed', 'returned', 'overdue']);

        $returnDate = null;
        if ($status === 'returned') {
            $returnDate = (clone $loanDate)->modify('+' . rand(1, 20) . ' days');
        } elseif ($status === 'overdue') {
            $dueDate = (clone $loanDate)->modify('-15 days'); // due in the past
        }

        return [
            'book_id' => \App\Models\Book::inRandomOrder()->first()?->id ?? \App\Models\Book::factory(),
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'loan_date' => $loanDate->format('Y-m-d'),
            'due_date' => $dueDate->format('Y-m-d'),
            'return_date' => $returnDate?->format('Y-m-d'),
            'status' => $status,
            'notes' => $this->faker->optional()->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
