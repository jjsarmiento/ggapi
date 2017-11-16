<?php 

namespace App\GameGate;

class GGate {

	// DATABASE CONFIG
	const DB_NAME = "gg_master";
	const DB_USER = "root";
	const DB_PASS = "";

	// ROLE CONFIG
	const RL_ADMN = [
		1,
		'ADMN',
		'Administrator'
	];

	// TOKEN CONFIG
	const TKN_DURATION_MONTH = 1;

	// CONTROLLER NAMES
	const MSTR_CONTROLLER 	= 'MasterController@';
	const USER_CONTROLLER 	= 'UserController@';
	const NEWS_CONTROLLER 	= 'NewsController@';

	// ERRORS
	const ERR_404 = 404; // not found
	const ERR_401 = 401; // unauthorized
	const ERR_403 = 403 ; // forbidden
	const ERR_500 = 500; // internal server error
	const ERR_498 = 498; // token expired or invalid
	const ST_SUCCESS = 200;
	const RQST_SUCCESS = 'GG00000';
	const USER_DOESNT_EXIST = 'GG00001';
	const USER_PASS_INCORRECT = 'GG00002';

	// CLASS STRINGS
	const LRVL_HTTP_REQUEST = "Illuminate\Http\Request";

	// COLUMN SELECT FOR TABLES
	// syntax `tablename_rolename`
	const USERS_USER = [

	];
}