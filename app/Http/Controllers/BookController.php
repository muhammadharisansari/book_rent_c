<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
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
        $category['categories'] = Category::all();
        return view('book-add', $category);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'book_code' => 'required|unique:books|max:40',
            'title' => 'required|max:100',
        ]);

        $newName = '';
        if ($request->file('image')) {
            //ambil extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //ganti nama
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            //masuk ke folder
            $request->file('image')->storeAs('cover', $newName);
        }
        // dd($newName);
        //ke db
        $request['cover'] = $newName;

        $book = Book::create($request->all());
        //categories() adalah nama function relasi di model book
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book added successfully!');
    }

    public function edit($slug)
    {
        $book['book'] = Book::where('slug', $slug)->first();
        $categories['categories'] = Category::all();
        return view('book-edit', $categories, $book);
    }

    public function update(Request $request,$slug)
    {
        // dd($request->all());
        
        if ($request->file('image')) {
            //ambil extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //ganti nama
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            //masuk ke folder
            $request->file('image')->storeAs('cover', $newName);
            // dd($newName);
            //ke db
            $request['cover'] = $newName;
        }
        $book = Book::where('slug',$slug)->first();
        $book->slug = null;
        $book->update($request->all());
        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Book updated successfully!');
    }

    public function delete($slug)
    {
        $book['book'] = Book::where('slug',$slug)->first();
        return view('book-delete',$book);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book deleted successfully!');
    }

    public function deletedBook()
    {
        $deletedBooks['dBooks'] = Book::onlyTrashed()->get();
        return view('book-deleted-list',$deletedBooks);
    }

    public function restore($slug)
    {
        $books = Book::withTrashed()->where('slug', $slug)->first();
        // dd($books);
        $books->restore();
        return redirect('books')->with('status', 'Book restored successfully!');
    }
}
