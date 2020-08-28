<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RoleUser
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
        if ($request->session()->has('user') &&
            DB::table('role_user')
                ->where('user_id', $request->session()->get('user'))
                ->pluck('role_id')
                ->first() === 2
        ){
            return $next($request);
        }
        return redirect()->back()->with(['message' => 'У вас нет прав доступа']);
    }
}
