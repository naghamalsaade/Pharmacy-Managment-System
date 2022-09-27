<?php

namespace App\Http\Middleware;

use Closure;

class user_Inventory
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
         $type=TypeUser::find(auth()->guard('web')->user()->type_id);
         var_dump($type);

      
        if($type->name=="employee_inventory")
        return $next($request);


      return back();
    }
}
