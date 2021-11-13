<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

 
use Illuminate\Http\Request;
use Closure;
 

class AdminMiddleWare
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
        if(Auth::user()->role == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect('/user/dashboard')->with('status','You Are not Allowed  to Access the Admin Dashboard');
        }
    }
}
