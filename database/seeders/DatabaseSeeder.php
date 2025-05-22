<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookLoan;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->count(30)->create();
        Category::factory()->count(15)->create();
        Author::factory()->count(20)->create();
        Publisher::factory()->count(20)->create();
        Book::factory()->count(20)->create();
        BookLoan::factory()->count(500)->create();
    }
}
