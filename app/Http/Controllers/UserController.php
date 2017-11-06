<?php

namespace App\Http\Controllers;

use App\User;
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
        $user->update($request->all());
        return GGateUtil::rspSuccess($user);
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
        return GGateUtil::rspSuccess();
    }

    public function adminUpdate( Request $request ) {
        $user = User::find($request->input('id'));
        $user->update($request->all());
        return GGateUtil::rspSuccess($user);
    }
}
