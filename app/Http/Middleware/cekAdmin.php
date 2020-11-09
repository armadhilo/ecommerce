<?php

namespace App\Http\Middleware;

use Closure;

class cekAdmin
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
        if(session('role') != '1' || session('role') != '2'){
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
