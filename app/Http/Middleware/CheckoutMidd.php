<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\CartItems;
use Closure;

class CheckoutMidd
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
        
        $res = CartItems::where('user_id', $user->id)->get();

        $countItems = count($res);
        

              if($countItems > 0)
             {
                return $next($request);
              }
              else{
                return redirect('/');
              }



             
         


        
    
}
}