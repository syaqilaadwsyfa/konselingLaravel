<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'register', 'registerGuru'
        ]);
    }

    //form register
    public function register()
    {
        return view('auth.register');
    }

    public function registerGuru()
    {
        return view('auth.registerGuru');
    }

    //store register
    public function store(Request $request, Auth $auth)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => 'required|min:4',
            'role_id' => 'required'
        ]);

        User::create([
            'role_id' => $request->role_id,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credential = $request->only('email','password');
        $auth::attempt($credential);
        $request->session()->regenerate();

        return redirect()->route('auth.dashboard')
        ->withSuccess('Anda Telah Registrasi dan Login!');
    }

    //form login
    public function login()
    {
        return view('auth.login');
    }

    //authentication
    public function authentication(Request $request, Auth $auth)
    {
        //validasi form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //proses autentikasi
        $credential = $request->only('email','password');
        if ($auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        }

        //jika proses authentikasi gagal akan diredirect kehalaman login
        return back()->withErrors([
            'email' => 'Email Tidak Ditemukan',
        ])->onlyInput('email');
    }

    //dashboard
    public function dashboard()
    {
        return view('auth.dashboard');
    }

    //logout
    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
