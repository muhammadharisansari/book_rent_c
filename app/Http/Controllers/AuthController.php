<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // cek status user jika inactive
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('login')->with('gagal', 'yout account is not active yet.');
            } else {
                // dd(Auth::user());
                $request->session()->regenerate();
                if (Auth::user()->role_id == 1) {
                    return redirect('dashboard');
                } elseif (Auth::user()->role_id == 2) {
                    return redirect('profile');
                }
            }
        } else {
            // gagal login
            return redirect('login')->with('gagal', 'tidak terdaftar/salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProcess(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'username'  => 'required|unique:users|max:255',
            'password'  => 'required|min:4|max:8',
            'phone'     => 'min:11|max:13',
            'address'   => 'required|max:255',
        ]);

        // dd($validatedData);
        $request['password'] = Hash::make($request->password);
        // dd($request->password);
        $user = User::create($request->all());

        // Session::flash('status', 'success');
        // Session::flash('pesan', 'Berhasil. Silahkan tunggu approve dari admin.');

        return redirect('register')->with('Berhasil', 'Berhasil. Silahkan tunggu approve dari admin untuk login.');
    }
}
