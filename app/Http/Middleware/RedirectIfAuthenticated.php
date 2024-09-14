<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
                //this MiddleWare Work to redirect Guests
                switch ($guard) {
                    case 'web':
                        if (Auth::guard($guard)->check()) {
                        return redirect()->to('admin/home');
                        }
                    break;
                    case 'client':
                        if (Auth::guard($guard)->check()) {
                        return redirect()->to('home');
                        }
                    break;
                }
        }

        return $next($request);
    }
}
