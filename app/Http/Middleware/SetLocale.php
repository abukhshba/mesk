<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supported = ['ar', 'en'];

        if (session()->has('locale') && in_array(session('locale'), $supported)) {
            app()->setLocale(session('locale'));
        } else {
            app()->setLocale(config('app.locale', 'ar'));
        }

        return $next($request);
    }
}
