<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Book::join('authors', 'authors.id', 'books.author_id')
            ->join('publishers', 'publishers.id', 'books.publisher_id')
            ->join('categories', 'categories.id', 'books.category_id')
            ->select('books.*','authors.name as author_name','publishers.name as publisher_name','categories.name as category_name')
            ->get();
        // dd($items);
        return view('library.book.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();
        $publishers = Publisher::select('id', 'name')->get();
        // dd($categories);
        return view('library.book.create', compact('categories', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validateData =  $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'unique:books', 'max:255'],
            'author_id' => ['integer', 'required'],
            'publisher_id' => ['integer', 'required'],
            'category_id' => ['integer', 'required'],
            'publication_year' => ['integer', 'required'],
            'quantity' => ['integer', 'required'],
            'description' => ['nullable'],
            'cover_image' => ['nullable']
        ]);

        // dd($validateData);
        if ($request->cover_image) {
            // Store file in "storage/app/public"
            $path = $request->file('cover_image')->store('uploads', 'public');
            $validateData['cover_image'] = $path;
        }

        // dd($validateData);
        Book::create($validateData);
        return redirect()->route('books.index')->with('status', 'book data stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $countries = DB::table('countries')->get();
        return view('library.book.edit', compact('countries', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validateData =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nationality' => ['integer', 'required'],
            'birth_date' => ['string', 'required'],
            'death_date' => ['nullable'],
            'biography' => ['nullable'],
            'photo' => ['required'],
        ]);


        if ($request->photo) {
            // Check if an old file exists and delete it
            if (!empty($book['photo']) && Storage::disk('public')->exists($book['photo'])) {
                Storage::disk('public')->delete($book['photo']);
            }
            // Store new file in "storage/app/public/uploads"
            $path = $request->file('photo')->store('uploads', 'public');
            $validateData['photo'] = $path;
        }


        // dd($validateData);
        $book->update($validateData);
        return redirect()->route('books.index')->with('status', 'book data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!empty($book['photo']) && Storage::disk('public')->exists($book['photo'])) {
            Storage::disk('public')->delete($book['photo']);
        }
        $book->delete();
        return redirect()->route('books.index')->with('status', 'book data deleted successfully.');
    }
}
