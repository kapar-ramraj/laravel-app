<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboardFirst()
    {
        $totalStudents = User::where('user_type', 'Student')->get()->count();
        $totalCategories = Category::get()->count();
        $totalAuthor = Author::all()->count();
        $totalPublisher = Publisher::get()->count();
        $totalNoOfDifferentBooks = Book::get()->count();

        $books = Book::all();

        return view('dashboard.dashboard_first', compact('totalStudents', 'totalCategories', 'totalAuthor', 'totalPublisher', 'totalNoOfDifferentBooks','books'));
    }
}
