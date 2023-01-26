<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //untuk logout
        // $request->session()->flush();

        $bookCount      = Book::count();
        $categoryCount  = Category::count();
        $userCount      = User::count();

        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }
}
