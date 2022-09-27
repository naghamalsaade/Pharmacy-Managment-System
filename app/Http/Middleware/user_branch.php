<?php

namespace App\Http\Middleware;

use Closure;

class user_branch
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
       // var_dump(dd(auth()->guard('web')->user()));
             if($type)

        if($type->type=="employee_branch")
        return $next($request);


      return back();
    }
}
