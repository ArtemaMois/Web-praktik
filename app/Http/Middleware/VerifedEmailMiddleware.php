<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifedEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(auth()->user()->email_verified_at){
                return $next($request);
            }
            return response()->json(['status' => 'failed', 'message' => "Требуется подтвердить email"]);
        }
        return response()->json(['status' => 'failed', 'message' => "Команда не аутентифицирована"]);
    }
}
