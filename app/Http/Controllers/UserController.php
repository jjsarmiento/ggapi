<?php

namespace App\Http\Controllers;

use App\User;
use Request;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;
use App\GameGate\TokenManager;

class UserController extends Controller
{
    public function get() {
        return response()->json(User::all());
    }

    public function findById( $userId ) {
        return response()->json(User::find($userId));
    }

    public function delete( $userId ) {
        User::destroy($userId);
        return GGateUtil::rspSuccess();
    }

    public function update( Request $request ) {
        
    }
}
