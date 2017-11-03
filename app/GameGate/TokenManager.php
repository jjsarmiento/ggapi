<?php 

namespace App\GameGate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\Token;

class TokenManager {

	// token validation
	public static function tokenIsValid( $token ) {
		return Token::where('content', $token)->whereDate("expires_at", ">", Carbon::now())->count() > 0 ? true : false;
	}

	public static function generateToken( $user ) {
		$tokenString = Hash::make( $user->password . $user->username . Carbon::now());
		$token = Token::where("user_id", $user->id)->first();

		$token = Token::firstOrNew([ 'user_id'	=>	$user->id ]);
		$token->content = $tokenString;
		$token->user_agent = $user->user_agent;
		$token->expires_at = Carbon::now();
		$token->save();

		return $token->content;
	}

}