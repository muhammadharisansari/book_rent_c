<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users['users'] = User::where('role_id',2)->where('status','active')->get();
        return view('user',$users);
    }

    public function profile()
    {
        //untuk logout
        // $request->session()->flush();

        return view('profile');
    }

    public function registeredUser()
    {
        $users['users'] = User::where('status','inactive')->where('role_id',2)->get();
        return view('registered-user',$users);
    }

    public function show($slug)
    {
        $user['user'] = User::where('slug',$slug)->first();
        return view('user-detail',$user);
    }
}
