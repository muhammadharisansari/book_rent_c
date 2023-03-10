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
        $request->validate([
            'name' => 'required|unique:categories|max:50',
        ]);

        Category::create($request->all());
        return redirect('categories')->with('status', 'Category added successfully!');
    }

    public function edit($slug)
    {
        $category['category'] = Category::where('slug', $slug)->first();
        return view('category-edit', $category);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:50',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category updated successfully!');
    }

    public function delete($slug)
    {
        $category['category'] = Category::where('slug', $slug)->first();
        return view('category-delete', $category);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category deleted successfully!');
    }

    public function deletedCategory()
    {
        $deleted['data'] = Category::onlyTrashed()->get();
        return view('category-deleted-list', $deleted);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        // dd($category);
        $category->restore();
        return redirect('categories')->with('status', 'Category restored successfully!');
    }
}
