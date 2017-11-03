<?php 

namespace App\GameGate;

class GGate {

	// DATABASE CONFIG
	const DB_NAME = "gg_master";
	const DB_USER = "root";
	const DB_PASS = "root";

	// TOKEN CONFIG
	const TKN_DURATION_MONTH = 1;

	// CONTROLLER NAMES
	const MSTR_CONTROLLER 	= 'MasterController@';
	const USER_CONTROLLER 	= 'UserController@';
	const NEWS_CONTROLLER 	= 'NewsController@';

	// ERRORS
	const ERR_404 = [
		'status_code'	=>	404 // not found
	];

	const ERR_401 = [
		'status_code'	=>	401 // unauthorized
	];

	const ERR_403 = [
		'status_code'	=>	403 // forbidden | role-access not allowed
	];

	const ERR_500 = [
		'status_code'	=>	500 // internal server error
	];

	const ERR_498 = [
		'status_code'	=>	498 // expired or invalid token
	];

	const ST_SUCCESS = [
		'status_code'	=>	200 // success
	];

	const RQST_SUCCESS = [
		'status_code'	=>	'GG00000'
	];

	const USER_DOESNT_EXIST = [
		'status_code'	=>	'GG00001'
	];

	const USER_PASS_INCORRECT = [
		'status_code'	=>	'GG00002'
	];
}