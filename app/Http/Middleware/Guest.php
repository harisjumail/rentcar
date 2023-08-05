<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
   
           //die(Auth::user()->role);
   
       if (Auth::check() && Auth::user()->role == 'user') {
         return $next($request);
       }
       elseif(Auth::check() && Auth::user()->role == 'manager') {
         return redirect('approval');
       }
       elseif(Auth::check() && Auth::user()->role == 'ga') {
         return redirect('approvalga');
      }
       else{
       return redirect('carrequest');
       }
    }
   }
