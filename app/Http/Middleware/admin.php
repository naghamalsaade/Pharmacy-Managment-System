<?php

namespace App\Http\Middleware;

use Closure;
use App\TypeUser;
class admin
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
     if($type)
        if($type->type=="admin")
        return $next($request);
      return back();
    }

}
