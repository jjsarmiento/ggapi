<?php

namespace App\GameGate;

use App\GameGate\GGate;

class GGateUtil {

	public static function rspSuccess( $data = [] ) {
		return GGateUtil::constructReponse($data, GGate::RQST_SUCCESS);
	}

	public static function rspUserNotExisting( $data = [] ) {
		return GGateUtil::constructReponse($data, GGate::USER_DOESNT_EXIST);
	}

	public static function rspUserPasswordIncorrect( $data = [] ) {
		return GGateUtil::constructReponse($data, GGate::USER_DOESNT_EXIST);
	}

	public static function rspTokenExpiredOrInvalid( $data = [] ) {
		return GGateUtil::constructReponse($data, GGate::ERR_498);
	}

	private static function constructReponse( $data = [], $gameGateResponseCodeArray ) {
		return response()->json(
			array_merge($data, $gameGateResponseCodeArray)
		);
	}
}