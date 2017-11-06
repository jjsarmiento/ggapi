<?php

namespace App\Http\Controllers;

use App\User;
use Request;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\TokenManager;
use App\GameGate\RoleManager;

class UserController extends Controller
{
    public function get( \Illuminate\Http\Request $request ) {
        if( RoleManager::isAdminViaToken( $request ) ) {
            return GGateUtil::rspSuccess( $this->getAllUsersWithTrashed() );
        } else {
            return GGateUtil::rspSuccess( $this->getAllUsers() );
        }
    }

    public function findById( $userId ) {
        return GGateUtil::rspSuccess(User::find($userId));
    }

    public function delete( $userId ) {
        User::destroy($userId);
        return GGateUtil::rspSuccess();
    }

    public function update( Request $request ) {
        
    }

    private function getAllUsersWithTrashed() {
        return User::withTrashed()->get()->load('roles');
    }

    private function getAllUsers() {
        return User::all()->load('roles');
    }
}
