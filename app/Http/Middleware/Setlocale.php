<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Closure;
class Setlocale
{
    public function handle($request, Closure $next){
        $lang = $request->session()->get('lang');
        if($lang == null) $lang = 'en';
        App::setLocale($lang[0]);
        return $request = $next($request);
    }
}
