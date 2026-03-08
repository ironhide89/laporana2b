<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna sudah terautentikasi
        if (!Auth::check()) {
            // Jika tidak terautentikasi, alihkan ke halaman login
            return redirect()->route('login');
        }

        // Periksa apakah pengguna admin dan mengakses route yang dimulai dengan 'user'
        if (Auth::user()->role === 'admin' && $request->is('user/*')) {
            // Jika admin mengakses route user, redirect ke halaman yang sesuai
            return redirect()->route('admin.dashboard_admin')->with('error', 'Admins cannot access user pages.');
        }

        // Periksa apakah pengguna user dan mengakses route yang dimulai dengan 'admin'
        if (Auth::user()->role === 'user' && $request->is('admin/*')) {
            // Jika user mengakses route admin, redirect ke halaman yang sesuai
            return redirect()->route('user.todolist')->with('error', 'Users cannot access admin pages.');
        }

        // Lanjutkan ke request berikutnya jika tidak ada masalah
        return $next($request);
    }
}
