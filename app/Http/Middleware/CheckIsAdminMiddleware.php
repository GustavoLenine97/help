<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class CheckIsAdminMiddleware
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
        $user = auth()->user(); 

        if ($user->level == 'admin'){
            return $next($request);
        }else {
            return redirect()->back()->with('message', 'ACESSO NEGADO');
        }
        
    }
}
