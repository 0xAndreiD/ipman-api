<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Log as RequestLog;

class Log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            $payload = JWTAuth::parseToken()->authenticate();
            $user = optional($payload)->id;
        } catch (JWTException $e) {
            $user = null;
        }

        // Log the request and response after the response is sent
        $log = [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user' => $user,
            'request' => json_encode($request->all()),
            'status' => $response->status(),
        ];

        RequestLog::create($log);

        return $response;
    }
}
