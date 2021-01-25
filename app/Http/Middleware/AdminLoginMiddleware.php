<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->level == 1)
                return $next($request);
            else
            {
                Auth::logout();
                return redirect()->route('admin-login')->with('notification','Không có quyền truy cập.');
            }
        }else{
            return redirect()->route('admin-login');
        }
        return $next($request);
    }
}