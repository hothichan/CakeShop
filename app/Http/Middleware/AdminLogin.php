<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        // if(!Auth::check()) return redirect()->route('account.login');

        $user = Auth::user();
        
        if ($role == 'admin' && $user->role !== 1) {
            Auth::logout();
            return redirect()->route('account.login');
        }

        if (Auth::check() && $role == 'user' && $user->role !== 0) {
            Auth::logout();
            return redirect()->route('home');
        }
        return $next($request);
    }
}
