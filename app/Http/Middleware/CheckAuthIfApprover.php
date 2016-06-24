<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAuthIfApprover
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($request->user()->type != 'approver') {
                abort(403, 'Unauthorized action.');
            }
        } 

        return $next($request);
    }
}
