<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class BookRentController extends Controller
{
    public function index()
    {
        $user['user']   = User::whereNot('role_id',1)->whereNot('status','inactive')->get(); 
        $book['book']   = Book::all();
        return view('book-rent',$user,$book);
    }
    public function store(Request $request)
    {
        $request['rent_date']   = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        // dd($request->all());

        $book = Book::findOrFail($request->book_id)->only('status');
        // dd($book); 

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the book is not available.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('book-rent');
        }else {

            $count = RentLogs::where('user_id',$request->user_id)->where('actual_return_date', null)->count();
            // dd($count);

            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, the user has reached the lending limit (3 or more).'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('book-rent');
            }
            else {
                try {
                    //penggunaan transaction memiliki syarat, name di form input harus sama dengan field table
                    DB::beginTransaction();
                    
                    // proses insert data ke tabel rent_log
                    RentLogs::create($request->all());
                    
                    // proses update tabel books
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
                    
                    Session::flash('message', 'Success, rent book successfully!'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect('book-rent');
                
                } catch (\Throwable $th) {
                    DB::rollBack();
                    dd($th);
                }
            }
        }

    }
}
