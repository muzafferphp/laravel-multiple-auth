<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class FrontUser
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
		if(empty(Session::has('FrontUserSession'))){
			return redirect('/');
		}
        return $next($request);
    }
}
