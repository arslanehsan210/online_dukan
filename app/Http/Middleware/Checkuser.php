<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Checkuser
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

        $user = Auth::user();
       if(!$user)
       {

        return redirect('login');

        }
        else{
            if($user->user_role != 1)
            {
                return redirect('admin'); 
            }
        }

        return $next($request);
    }
}
