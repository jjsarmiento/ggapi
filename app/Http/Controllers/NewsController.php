<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;

class NewsController extends Controller
{
    public function get() {
    	return GGateUtil::rspSuccess(News::all());
    }

    public function findById( $newsId ) {
    	return GGateUtil::rspSuccess(News::find($newsId)->load('author'));
    }

    public function findByUser( $userId ) {
    	return GGateUtil::rspSuccess(News::where('user_id', $userId)->get());
    }
}
