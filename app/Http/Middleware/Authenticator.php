<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sessions;
use Illuminate\Http\Request;

class Authenticator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $session = Sessions::where('uuid', $request->header('uuid'))->first();
            if (is_null($session)) {
                throw new \Exception('Unauthorized');
            }

            if ($session->user_ip != $request->ip()) {
                throw new \Exception('Unauthorized');
            }

            if ($session->validity < time()) {
                throw new \Exception('Session expired');
            }
            $request->Session = $session;
            $request->user = $session->user()->first();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }

        return $next($request);
    }
}
