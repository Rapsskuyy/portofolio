<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login admin
     */
    public function showLogin()
    {
        if (Auth::user()?->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Proses autentikasi login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'email' => $request->string('email')->lower()->toString(),
            'password' => $request->input('password'),
            'is_admin' => true,
        ])) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin Raffa!');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'login' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Process logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout.');
    }
}
