<?php

namespace App\Http\Middleware;

use Closure;

class ApprovedSeller
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
        if(auth()->user()->type == 'seller' && auth()->user()->approved){
            return $next($request);
        }else if(auth()->user()->type == 'admin'){
            return $next($request);
        }else if(auth()->user()->type == 'user'){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('notApprovedSeller');
        }
    }
}
