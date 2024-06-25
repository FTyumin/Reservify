<?php

namespace App\Http\Middleware;
use Spatie\Permission\Traits\HasRole;
use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}

