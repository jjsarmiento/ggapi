<?php

namespace App\Http\Middleware;

use Closure;
use Request;

use App\GameGate\TokenManager;
use App\GameGate\GGate;

class GGateTokenValidate
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

		if ( TokenManager::tokenIsValid($token) ) {
			return $next($request);
		} else {
			return response()->json(GGate::ERR_498);
		}
	}
}
