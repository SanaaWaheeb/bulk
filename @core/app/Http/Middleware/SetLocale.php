<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (Session::has('lang')) {
            app()->setLocale(Session::get('lang'));
        } else {
            app()->setLocale('en');
        }
        return $next($request);
    }
}    