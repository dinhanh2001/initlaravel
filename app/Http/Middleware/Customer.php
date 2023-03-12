<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Customer
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
        // Nếu chưa đăng nhập
        if(!Auth::guard('customer')->check()){
            return redirect()->route('user.get.login');
        }
        return $next($request);
    }
}
