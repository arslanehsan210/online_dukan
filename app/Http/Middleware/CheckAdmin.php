<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckAdmin
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
        if($user){
        if($user->user_role != 2)
        {
            return redirect('/');
        }  
        else{

            return $next($request);
        }
    }
    else{
        return redirect('/');
        return $next($request);
    }


        
        
    }


            
}
