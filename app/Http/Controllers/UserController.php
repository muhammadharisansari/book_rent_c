<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        //untuk logout
        // $request->session()->flush();

        var_dump('halaman profile userC');
        dd(Auth::user());
    }
}
