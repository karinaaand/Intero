<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectByEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->email === 'theprocrastinatorman@gmail.com') {
            return redirect('/teacher');
        }

        if ($request->email === 'ibnumknd@gmail.com') {
            return redirect('/student');
        }

        return redirect('/unauthorized'); // default/fallback
    }
}
