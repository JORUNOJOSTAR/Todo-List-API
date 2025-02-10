<?php

use App\Http\Controllers\Api\V1\auth\LoginController;
use App\Http\Controllers\Api\V1\auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(){
    return "Hello!";
});

Route::get('/secret',function(Request $request){
    return [
        'user_name' => $request->user()->name
    ];
})->middleware('auth:sanctum');

Route::group(['namespace'=>'App\Http\Controllers\Api\V1\auth'],function(){
  Route::post('/login',LoginController::class);
  Route::post('/register',RegisterController::class);
});


