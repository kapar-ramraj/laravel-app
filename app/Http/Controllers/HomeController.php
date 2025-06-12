<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\ContactUs;
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
        return view('frontend.home.index', compact('books', 'students', 'authors', 'popularBooks'));
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
        // echo phpinfo();
        return view('frontend.home.contactus');
    }

    public function storeContactUs(Request $request)
    {
        // dd($request->all());
        $validateData =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255'],
            'subject' => ['string', 'required','max:555'],
            'message' => ['nullable'],
            'captcha' => ['required','captcha'],
        ]);

        // dd($validateData);
        ContactUs::create($validateData);

        return response()->json(['status'=>true, 'message'=>'Your message send successfully']);
    }
}
