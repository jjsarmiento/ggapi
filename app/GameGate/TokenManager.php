<?php 

namespace App\GameGate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;

use Carbon\Carbon;

use App\Token;

class TokenManager {

	public static function tokenIsValid( $token ) {
		return Token::where('content', $token)->whereDate("expires_at", ">", Carbon::now())->count() > 0 ? true : false;
	}

	public static function status( $token ) {
		$token = Token::where("content", $token)->first();
		if ( $token ) {
			$token->expires_at = Carbon::parse($token->expires_at);
			
			if( $token->expires_at->gt( Carbon::now() ) ) {
				return GGateUtil::rspSuccess([
					'valid' => true,
					'expired' => false,
				]);
			} else {
				return GGateUtil::rspTokenExpiredOrInvalid([
					'valid' => true,
					'expired' => true,
				]);
			}
		} else {
			return GGateUtil::rspTokenExpiredOrInvalid([
				'valid' => false,
				'expired' => null,
			]);
		}
	}

	public static function generateToken( $user ) {
		$tokenString = Hash::make( $user->password . $user->username . Carbon::now());
		$token = Token::where("user_id", $user->id)->first();

		$token = Token::firstOrNew([ 'user_id'	=>	$user->id ]);
		$token->content = $tokenString;
		$token->user_agent = $user->user_agent;
		$token->expires_at = Carbon::now()->addMonths(GGate::TKN_DURATION_MONTH);
		$token->save();

		return $token->content;
	}

}