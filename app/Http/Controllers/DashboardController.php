<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
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
        $rentlogs['rentlogs'] = RentLogs::with(['user','book'])->paginate(3);
        return view('dashboard', $rentlogs, ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }
}
