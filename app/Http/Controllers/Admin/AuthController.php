<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Tampilkan form login admin
     */
    public function showLogin()
    {
        if (session('admin_authenticated')) {
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
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $validUsername = 'raffa';
        $validPassword = 'maygustosiraffakaybalqis';

        if ($request->username === $validUsername && $request->password === $validPassword) {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin Raffa!');
        }

        return back()->withInput($request->only('username'))->withErrors([
            'login_error' => 'Username atau password yang Anda masukkan salah.'
        ]);
    }

    /**
     * Process logout admin
     */
    public function logout(Request $request)
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout.');
    }
}
