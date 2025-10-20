<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        $preferredLocale = $request->session()->get('locale');

        if ($preferredLocale) {
            App::setLocale($preferredLocale);
        }

        return $next($request);
    }

   
}
