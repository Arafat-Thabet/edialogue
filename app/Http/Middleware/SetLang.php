<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;

class SetLang {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        // $lang = 'en';
        
        // $request->attributes->add(['lang' => 'en']);
        $request->route()->setParameter('lang', 'ar');
        // $request->request->set('lang', 'en');

        return $next($request);
    }
}