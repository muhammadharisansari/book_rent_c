<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category['category'] = Category::all();
        return view('category', $category);
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect('categories');
    }
}
