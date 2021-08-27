<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminauth
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
        if(!$request->session()->has('adminid')){
			return redirect('login');
		}
		
		return $next($request);
}
}