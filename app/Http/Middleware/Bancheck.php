<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Bancheck
{
    public function handle($request, Closure $next){
        if (Auth::user()->status == -1){
            return response(['errors' => ['user' => ['user is banned']]], 424);
        } else {
            return $request = $next($request);
        }
    }
}
