<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //ddd($request);
        if(Auth::user() == null){
            if($request->is('/')){
                return $next($request);
            }else{
                return redirect('register');
            }
        }

        $role = Auth::user()->role;


        if($role == "user"){
            if($request->routeIs('dashboard')){
                return $next($request);
            }else{
                return abort(403);
            }
        }else if($role == "admin"){
            if($request->routeIs('dashboard')){
                return $next($request);
            }else if($request->routeIs('users.index')){
                return $next($request);
            }else{
                return abort(403);
            }
        }else if($role == "super"){
            if($request->routeIs('dashboard')){
                return $next($request);
            }else if($request->routeIs('users.*')){
                return $next($request);
            }else{
                return abort(403);
            }
        }
        return $next($request);
    }
}
