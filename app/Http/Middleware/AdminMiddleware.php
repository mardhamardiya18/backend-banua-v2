<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user sudah login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Jika user bukan admin, logoutkan user dan redirect ke login
        if (auth()->user()->roles !== 'admin') {
            auth('web')->logout(); // Logout user
            $request->session()->invalidate(); // Hapus session user
            $request->session()->regenerateToken(); // Regenerate CSRF token

            return redirect('/login')->dangerBanner('Anda tidak memiliki akses sebagai admin.');
        }

        return $next($request);
    }
}
