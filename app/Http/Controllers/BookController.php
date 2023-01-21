<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books['book'] = Book::all();
        return view('book', $books);
    }

    public function add()
    {
        return view('book-add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'book_code' => 'required|unique:books|max:40',
            'title' => 'required|max:100',
        ]);

        Book::create($request->all());
        return redirect('books')->with('status', 'Book added successfully!');
    }
}
