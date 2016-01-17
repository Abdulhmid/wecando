<?php

namespace App\Http\Middleware;

use Closure;

class authMember
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
        $session = session('member_session');
        if (empty($session)) {
            return redirect('/go')->with('error', 'Silahkan login terlebih dahulu.');
        }else{
            return $next($request);
        }
    }
}
