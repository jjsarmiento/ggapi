<?php

namespace App\Http\Controllers;

use App\User;
use App\Token;
use Illuminate\Http\Request;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\TokenManager;

class UserController extends Controller
{
	public function get() {
		$users = User::all();
		$users = $users != null ? $users->load('roles') : null;
		return GGateUtil::rspSuccess($users);
	}

	public function findById( $userId ) {
		$user = User::find($userId);
		$user = $user != null ? $user->load('roles') : null;
		return GGateUtil::rspSuccess($user);
	}

	public function delete( $userId ) {
		User::destroy($userId);
		return GGateUtil::rspSuccess();
	}

	public function update( Request $request ) {
		$user = User::find($request->id);
		$currentUserId = Token::where('content', $request->header('token'))->first()->user_id;

		if( @$user->id === $currentUserId ) {
			$user->update($request->all());
			return GGateUtil::rspSuccess($user);	
		} else {
			return GGateUtil::rspOperationForbidden();
		}
	}

	public function adminGet() {
		return GGateUtil::rspSuccess(User::withTrashed()->get()->load('roles'));
	}

	public function adminFindById( $userId ) {
		$user = User::withTrashed()->find($userId);
		$user = $user != null ? $user->load('roles') : null;
		return GGateUtil::rspSuccess($user);
	}

	public function adminDelete( $userId ) {
		User::delete($userId);
		$user = User::withTrashed()
			->find($userId);
		$user->forceDelete();

		if( $user ) {
	    	$user->forceDelete();
			return GGateUtil::rspSuccess();
		} else {
			return GGateUtil::rspOperationForbidden();
		}
	}

	public function adminUpdate( Request $request ) {
		$user = User::find($request->input('id'))->load('roles');
		$user->update($request->all());
		
		if ( @$request->input('role_add') ) {
			$user->roles()->attach($request->input('role_add'));
		} else if ( @$request->input('role_del') ) {
			$user->roles()->detach($request->input('role_del'));
		}

		$user = User::find($request->input('id'))->load('roles');
		return GGateUtil::rspSuccess($user);
	}
}
