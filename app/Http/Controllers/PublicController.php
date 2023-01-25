<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->category || $request->title) {
            //hanya berdasar title
            // $books['books'] = Book::where('title','like','%'.$request->title.'%')->get();
            
            // hanya berdasar category
            // $books['books'] = Book::whereHas('categories', function($q) use($request){
            //    $q->where('categories.id',$request->category);
            // })->get();

            // berdasar satu atau keduanya (categories adalah nama function relasi di model book)
            // namun pencarian hanya dengan category terjadi bug (tidak terfilter)
            $books['books'] = Book::where('title','like','%'.$request->title.'%')->orWhereHas('categories', function($q) use($request) {
                $q->where('categories.id',$request->category);
            })->get();
        } else {
            $books['books'] = Book::all();
        }
        
        $cat['cat'] = Category::all();
        return view('book-list',$books,$cat);
    }
}
