<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all()->count();
        $students = User::where('user_type', 'Student')->get()->count();
        $authors = Author::all()->count();
        $popularBooks = Book::inRandomOrder()->take(3)->get();
        return view('frontend.home.index', compact('books', 'students', 'authors','popularBooks'));
    }

    public function aboutUs()
    {
        $books = Book::all()->count();
        $students = User::where('user_type', 'Student')->get()->count();
        $authors = Author::all()->count();
        return view('frontend.home.aboutus', compact('books', 'students', 'authors'));
    }

    public function getBooks()
    {
        return view('frontend.home.books');
    }

    public function getAuthors()
    {
        return view('frontend.home.authors');
    }

    public function getEvents()
    {
        return view('frontend.home.events');
    }

    public function getContactUs()
    {
        return view('frontend.home.contactus');
    }
}
