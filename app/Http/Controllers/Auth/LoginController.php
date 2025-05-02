<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.pages.login.index'); // Menampilkan view login
    }

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt login
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Login berhasil, redirect ke halaman home
        return redirect()->intended('/home');
    }

    // Login gagal, kembali ke halaman login dengan pesan error
    return redirect()->route('login')->withErrors([
        'login' => 'Email atau password yang Anda masukkan salah.',
    ]);
}
}

