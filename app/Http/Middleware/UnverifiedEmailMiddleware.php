<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnverifiedEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $team = $request->route('team');
        if(isset($team->email_verified_at)){
            return response()->json(['status' => 'Email already verified']);
        }
        return $next($request);
    }
}
