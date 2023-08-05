<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class Admin
{
 /**
 * Handle an incoming request.
 *
 * @param \Illuminate\Http\Request $request
 * @param \Closure $next
 * @return mixed
 */
 public function handle($request, Closure $next)
 {

        //die(Auth::user()->role);

        $role = array('admin','ga');

        if (Auth::check() && in_array(Auth::user()->role,$role)) {
          return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role == 'manager') {
          return redirect('approval');
        }
        else{
        return redirect('carrequest');
        }
 }
}