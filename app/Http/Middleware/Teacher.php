<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->role == 'teacher' ) {
            return $next( $request );

        } elseif ( Auth::check() && Auth::user()->role == 'librarian' ) {
            return redirect( '/librarian' );
        } elseif ( Auth::check() && Auth::user()->role == 'admin' ) {
            return redirect( '/admin' );
        }  elseif ( Auth::check() && Auth::user()->role == 'accountant' ) {
            return redirect( '/accountant' );
        }  else {
            return redirect( '/' );
        }
    }
}
