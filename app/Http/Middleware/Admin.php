<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!Auth::check()){
            return redirect('/login');
        }else{
            $user = Auth::user();
            if ($user->role == 'admin'){
                return $next($request);
            }else {
                return redirect('/');
            }
        }
    }
}
