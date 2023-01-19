<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user');
    }

    public function profile(Request $request)
    {
        //untuk logout
        // $request->session()->flush();

        return view('profile');
    }
}
