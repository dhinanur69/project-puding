<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Jika sesi 'user' masih ada, langsung lempar ke halaman utama
        if (session()->has('user')) return redirect()->route('home');
        return view('login');
    }

    public function login(Request $request)
    {
        $valid_user = "admin";
        $valid_pass = "12345";

        if ($request->username == $valid_user && $request->password == $valid_pass) 
        {
            session(['user' => $request->username]);
            return redirect()->route('home');
        } 
        
        return back()->with('error', 'Username atau password salah!');
    } 

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}