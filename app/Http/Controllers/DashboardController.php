<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //untuk logout
        // $request->session()->flush();

        $bookCount      = Book::count();
        $categoryCount  = Category::count();
        $userCount      = User::count();

        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }
}
