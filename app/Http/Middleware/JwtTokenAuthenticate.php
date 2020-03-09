<?php

namespace App\Http\Middleware;

use Closure;
use http\Exception;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtTokenAuthenticate
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return Response::json([
                    'status' => false,
                    'msg' => 'TOKEN_EXPIRED',
                    'access_token' => auth()->refresh(),
                    'user' => auth()->user()
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return Response::json([
                    'status' => false,
                    'msg' => 'TOKEN_INVALID'
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
                return Response::json([
                    'status' => false,
                ], 401);
            } else {
                return Response::json([
                    'status' => false,
                    'msg' => 'TOKEN_MISSING'
                ], 401);
            }
        }

        return $next($request);
    }
}
