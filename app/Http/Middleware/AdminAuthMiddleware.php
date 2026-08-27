<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah terotentikasi via session atau URL key legacy
        if (session('admin_authenticated') === true || $request->query('key') === 'raffa') {
            // Jika masuk pakai query key raffa, otomatis simpan session agar nav bertahan
            if ($request->query('key') === 'raffa') {
                session(['admin_authenticated' => true]);
            }
            return $next($request);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return redirect()->route('admin.login')->withErrors([
            'auth_required' => 'Silakan login terlebih dahulu untuk mengakses Admin Panel.'
        ]);
    }
}
