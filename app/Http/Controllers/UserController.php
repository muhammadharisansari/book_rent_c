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

    public function approve($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('users')->with('status','Approved successfully.');
    }

    public function delete($slug)
    {
        $user['user'] = User::where('slug',$slug)->first();
        return view('user-delete', $user);
    }

    public function destroy($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->delete();
        return redirect('users')->with('status','Delete user successfully.');
    }

    public function bannedUser()
    {
        $banUser['ban'] = User::onlyTrashed()->get();
        return view('user-banned',$banUser);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug',$slug)->first();
        $user->restore();
        return redirect('users')->with('status','Restore user successfully.');
    }
}
