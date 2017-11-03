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

	public static function rpsUserPasswordIncorrect( $data = [] ) {
		return GGateUtil::constructReponse($data, GGate::USER_DOESNT_EXIST);
	}

	private static function constructReponse( $data = [], $GameGateResponseCodeArray ) {
		return response()->json(
			array_merge($data, GGate::RQST_SUCCESS)
		);
	}
}