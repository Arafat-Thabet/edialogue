<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = isset(auth()->user()->lang) ? auth()->user()->lang : 'ar';
        if (in_array($lang, ['en', 'ar']))
            App::setLocale($lang);
            return $next($request);
    }
}
