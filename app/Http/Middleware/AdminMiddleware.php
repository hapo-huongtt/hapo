<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // if (Auth::check()) {
        //     $member = Auth::member();
        //     if ($member->role == 1) {
        //         return $next($request);
        //     } else {
        //         return redirect('member/login');
        //     }
        // } else {
        //     return redirect('member/login');
        // }
    }
}
