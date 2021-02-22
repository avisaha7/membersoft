<?php

namespace App\Http\Middleware;

use Closure;

class ApproveMiddleware
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
        if (auth()->check()) {
            if (!auth()->user()->status) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('Your Account Needs Admin Approval'));
            }
        }

        return $next($request);
    }
}
