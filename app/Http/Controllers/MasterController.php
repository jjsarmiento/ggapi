<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\TokenManager;

use App\User;
use App\Role;

class MasterController extends Controller
{
	public function authenticateAndGenerateToken(Request $request) {
		$user = User::where('username', $request->username)->first();

		if( $user ) {
			if ( Hash::check($request->password, $user->password) ) {
				$user->user_agent = $request->header('User-Agent');
				$token = TokenManager::generateToken($user);
				return GGateUtil::rspSuccess(['token' => $token]);
			} else {
				return GGateUtil::rspUserNotExisting();
			}
		} else {
			return GGateUtil::rspUserPasswordIncorrect();
		}

	}

	public function status( Request $request ) {
		return TokenManager::status( $request->header('token') );
	}

	public function test() {
		// return response()->json(User::find(1)->roles);
		// return response()->json(Role::find(1)->users);
		// return response()->json(Role::all()->load('users'));
		User::find(1)->roles()->detach(2);
	}
}
