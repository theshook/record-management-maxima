<?php

namespace App\Http\Middleware;

use Closure;

class DirectorMiddleware
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
        if ($request->user() && $request->user()->position != 'director') {
            session()->flash('error', 'You don\'t have permission to perform this operation.');
            return back();
        }
        return $next($request);
    }
}
