<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = auth()->user()->role;

        if($role == "guest"){
            return redirect()->route('');
        }else if($role == "user"){
            return redirect()->route('dashboard');
        }else if($role == "admin"){
            return redirect()->route('user.index');
        }else if($role == "super"){
            return redirect()->route('user.index');
        }else{
            return abort(403);
        }

        return $next($request);
    }
}
