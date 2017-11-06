<?php 

namespace App\GameGate;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;

use App\Role;
use App\User;
use App\Token;

class RoleManager {

	private static function getRoleIdById( $userId ) {
		return User::find($userId)->roles->pluck('id');
	}

	private static function getRoleIdByToken( $token ) {
		return User::find(
				Token::where("content", $token)->first()->user_id
			)->roles->pluck('id');
	}

	public static function isAdminViaToken( $request ) {

		if ( is_a($request, GGate::LRVL_HTTP_REQUEST) ) {
			$token = $request->header('token');
		} else {
			$token = $request;
		}

 		foreach(RoleManager::getRoleIdByToken( $token ) as $key => $val) {
            if( in_array($val, GGate::RL_ADMN) ) {
                return true;
            }
        }

        return false;
	}

}