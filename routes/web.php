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

Route::prefix('/api')->group(function(){

	// protected routes
	Route::group(['middleware' => ['gg-token']], function() {
		// Users Entity
		Route::get('/users',				GGate::USER_CONTROLLER . 'get');
		Route::put('/users',				GGate::USER_CONTROLLER . 'update');
		Route::delete('/user/{userId}',		GGate::USER_CONTROLLER . 'delete');
		Route::get('/user/{userId}',		GGate::USER_CONTROLLER . 'findById');

		// News Entity
		Route::get('/news', 			GGate::NEWS_CONTROLLER . 'index');
		Route::get('/news/{newsId}', 	GGate::NEWS_CONTROLLER . 'findById');

	});

	Route::prefix('/token')->group(function(){
		// Token operations
		Route::get('/status/{tokenString}',	GGate::MSTR_CONTROLLER . 'status');
		Route::post('/authenticate',		GGate::MSTR_CONTROLLER . 'authenticateAndGenerateToken');

	});
});