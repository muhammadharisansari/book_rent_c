<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index()
    {
        $books['books'] = Book::all();
        return view('book-list',$books);
    }
}
