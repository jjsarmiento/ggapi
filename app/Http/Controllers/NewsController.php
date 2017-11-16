<?php

namespace App\Http\Controllers;

use App\News;
use App\Token;
use Illuminate\Http\Request;

use App\GameGate\GGate;
use App\GameGate\GGateUtil;

class NewsController extends Controller
{
    public function get() {
    	return GGateUtil::rspSuccess(News::all()->load('author'));
    }

    public function findById( $newsId ) {
    	return GGateUtil::rspSuccess(News::find($newsId)->load('author'));
    }

    public function findByUser( $userId ) {
    	return GGateUtil::rspSuccess(News::where('user_id', $userId)->get());
    }

    public function update( Request $request ) {
    	$news = News::find($request->id);
    	$userId = Token::where('content', $request->header('token'))->first()->user_id;

    	if ( @$news->user_id === $userId ) {
	    	$news->update($request->all());
	    	return GGateUtil::rspSuccess($news);    		
    	} else {
			return GGateUtil::rspOperationForbidden();
    	}
    }

    public function delete( $newsId ) {
    	News::destroy($newsId);
		return GGateUtil::rspSuccess();
    }

    // Administrator functions
    public function adminGet() {
    	return GGateUtil::rspSuccess(
    		News::withTrashed()
    		->get()
    		->makeVisible(GGate::TBL_NEWS_HIDDEN)
    		->load('author')
    	);
    }

    public function adminFindById( $newsId ) {
    	return GGateUtil::rspSuccess(
    		News::withTrashed()
    		->find($newsId)
    		->makeVisible(GGate::TBL_NEWS_HIDDEN)
    		->load('author')
    	);
    }

    public function adminFindByUser( $userId ) {
    	return GGateUtil::rspSuccess(
    		News::withTrashed()
    		->where('user_id', $userId)
    		->get()
    		->makeVisible(GGate::TBL_NEWS_HIDDEN)
    	);
    }

    public function adminUpdate( Request $request ) {
    	$news = News::find($request->id);
    	$news->update($request->all());
    	return GGateUtil::rspSuccess($news);
    }

    public function adminDelete( $newsId ) {
    	$news = News::withTrashed()
    		->find($newsId);

		if( $news ) {
	    	$news->forceDelete();
			return GGateUtil::rspSuccess();
		} else {
			return GGateUtil::rspOperationForbidden();
		}
    }
}
