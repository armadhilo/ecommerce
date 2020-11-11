<?php

namespace App\Http\Middleware;

use Closure;
use Session;

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
        if(Session::get('role') != '2'){
            return redirect('/login')->with('error','Anda harus login terlebih dahulu sebagai User');
        }

        return $next($request);
    }
}
