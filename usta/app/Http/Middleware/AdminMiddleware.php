<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $nexts
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //ovo triba podesit
        if (Auth::check()) {
            if (!Auth::user()->isAdmin){
                return redirect()->route('home')->with(['fail'=> 'Nice try bro!']);
            }
        }
        else {
            return redirect()->route('guestHome')->with(['fail'=> 'Nice try bro!']);
        }
        return $next($request);
    }
}
