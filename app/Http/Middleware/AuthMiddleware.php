<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role == 'admin' && $request->is('homepeminjam', 'homepetugas')) {
            return redirect()->route('homeadmin');
        }

        if ($user->role == 'peminjam' && $request->is('homeadmin', 'homepetugas')) {
            return redirect()->route('homepeminjam');
            
        }

        if ($user->role == 'petugas' && $request->is('homepeminjam', 'homeadmin')) {
            return redirect()->route('homepetugas');
            
        }

        return $next($request);

    }
}
