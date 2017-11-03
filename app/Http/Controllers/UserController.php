<?php

namespace App\Http\Controllers;

use App\User;
use Request;

class UserController extends Controller
{
    public function get() {
    	return response()->json(User::all());
    }

    public function findById( $userId ) {
    	return response()->json(User::find($userId));
    }
}
