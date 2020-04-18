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

        switch (Auth::user()->usertype) 
        {
            case 'admin':
                return $next($request);
                break;
            
            case 'superadmin': 
                return $next($request);
                break;
            case '':
                return redirect('/home')->with('status','Selain Admin Tidak Dapat Mengakses Dashboard');
            break;
        }
        // if(Auth::user()->usertype =='admin')
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     return redirect('/home')->with('status','Selain Admin Tidak Dapat Mengakses Dashboard');

        // }
        
    }
}
