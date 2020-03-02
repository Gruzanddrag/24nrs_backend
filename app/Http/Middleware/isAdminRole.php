<?php

namespace App\Http\Middleware;

use Closure;

class isAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = "")
    {
        $userRole = auth()->user()->role;
        if(!$role){
            if (!in_array($userRole, ['super_admin', 'admin'])){
                return response()->json([
                    'status' => false,
                    'msg' => 'NOT_AVAILABLE_FOR_CURRENT_USER'
                ]);
            }
        } else {
            if($userRole != $role) {
                return response()->json([
                    'status' => false,
                    'msg' => 'NOT_AVAILABLE_FOR_CURRENT_USER'
                ]);
            }
        }
        return $next($request);
    }
}
