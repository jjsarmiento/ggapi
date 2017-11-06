<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\RoleManager;

class RoleBasedAccess
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
        $token = ($request->token != null) ? $request->token : Request::header('token');

        if ( RoleManager::isAdminViaToken( $request ) ) {
            return $next($request);
        } else {
            return GGateUtil::rspAccessUnauthorized();
        }
    }
}
