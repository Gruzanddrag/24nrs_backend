<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

class isAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role = "")
    {
        $userRole = auth()->user()->role;
        if(!$role){
            if (!in_array($userRole, ['super_admin', 'admin'])){
                return Response::json([
                    'status' => false,
                    'msg' => 'NOT_AVAILABLE_FOR_CURRENT_USER'
                ], 401);
            }
        } else {
            if($userRole != $role) {
                return Response::json([
                    'status' => false,
                    'msg' => 'NOT_AVAILABLE_FOR_CURRENT_USER'
                ], 401);
            }
        }
        return $next($request);
    }
}
