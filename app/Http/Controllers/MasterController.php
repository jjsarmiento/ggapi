<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\TokenManager;

use App\User;

class MasterController extends Controller
{
	private $tokenManager;

	public function __construct() {
		$this->tokenManager = new TokenManager();
	}

	public function authenticate(Request $request) {
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
			return GGateUtil::rpsUserPasswordIncorrect();
		}

	}
}
