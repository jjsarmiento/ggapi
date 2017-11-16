<?php

use App\GameGate\GGate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', GGate::MSTR_CONTROLLER . 'test');

Route::prefix('/api')->group(function(){

	// protected routes
	
	// ADMINISTRATOR ROUTES
	Route::group(['prefix' => '/admin', 'middleware' => ['gg-token', 'gg-rbac']], function() {
		// Users Entity
		Route::get('/users',				GGate::USER_CONTROLLER . 'adminGet');
		Route::put('/users',				GGate::USER_CONTROLLER . 'adminUpdate');
		Route::delete('/user/{userId}',		GGate::USER_CONTROLLER . 'adminDelete');
		Route::get('/user/{userId}',		GGate::USER_CONTROLLER . 'adminFindById');
	});

	// COMMON ROUTES
	Route::group(['middleware' => ['gg-token']], function() {
		// Users Entity
		Route::get('/users',				GGate::USER_CONTROLLER . 'get');
		Route::get('/user/{userId}',		GGate::USER_CONTROLLER . 'findById');
		Route::put('/users',				GGate::USER_CONTROLLER . 'update');
		Route::delete('/user/{userId}',		GGate::USER_CONTROLLER . 'delete');

		// News Entity
		Route::get('/news', 				GGate::NEWS_CONTROLLER . 'get');
		Route::get('/news/{newsId}', 		GGate::NEWS_CONTROLLER . 'findById');
		Route::get('/news/user/{userId}', 	GGate::NEWS_CONTROLLER . 'findByUser');
		Route::put('/news', 				GGate::NEWS_CONTROLLER . 'update');
		Route::delete('/news/{newsId}',		GGate::NEWS_CONTROLLER . 'delete');
	});

	Route::prefix('/token')->group(function(){
		// Token operations
		Route::get('/status',				GGate::MSTR_CONTROLLER . 'status');
		Route::post('/authenticate',		GGate::MSTR_CONTROLLER . 'authenticateAndGenerateToken');

	});
});