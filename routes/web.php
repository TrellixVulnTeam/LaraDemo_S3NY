<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;

Route::get('/',[HomeController::class,'indexPage']);

Route::group(['prefix' => 'user'], function(){
	 Route::group(['prefix' => 'auth'], function(){
		         Route::get('/sign-up', [UserAuthController::class,'signUpPage']);
			 Route::post('/sign-up', [UserAuthController::class,'signUpProcess']);
			 Route::get('/upload', [UserAuthController::class,'uploadPage']);
			 Route::post('/file/upload',[UserAuthController::class,'upload']);
		         Route::get('/sign-in', 'UserAuthController@signInPage');
		         Route::post('/sign-in', 'UserAuthController@signInProcess');
		         Route::get('/sign-out', 'UserAuthController@signOut');
	 });
});

?>
