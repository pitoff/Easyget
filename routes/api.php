<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\BusinessController;
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
//public routes
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);

//
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('v1')->group(function(){
        
        Route::get('/businesses', [BusinessController::class, 'index']);
        Route::get('/business/{business}', [BusinessController::class, 'show']);
        Route::get('/get-businesses-by-cat/{id}', [BusinessController::class, 'getBusinessByCategory']);
        Route::post('/create-business', [BusinessController::class, 'store']);
        Route::put('/business/edit/{business}', [BusinessController::class, 'update']);
        Route::post('/logout', [LogoutController::class, 'store']);
    
    });
});
