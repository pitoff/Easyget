<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\BusinessController;
use App\Http\Controllers\Dashboard\BusinessPhotoController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MakeManagerRequestController;
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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/category', [CategoryController::class, 'index'])->name('addCategory');
Route::post('/category', [CategoryController::class, 'store']);

Route::name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::post('/make-manager-request', [MakeManagerRequestController::class,'makeManagerRequest'])->name('make-manager-request');

    Route::get('/create-business', [BusinessController::class, 'createBusiness'])->name('create-business');
    Route::post('/create-business', [BusinessController::class, 'store']);
    Route::get('/show-business/{business:business_name}/show', [BusinessController::class, 'show'])->name('show-business');
    Route::get('/business/{business:business_name}/edit', [BusinessController::class, 'edit'])->name('edit-business');
    Route::put('/business/{business:business_name}/edit', [BusinessController::class, 'update']);
    Route::get('/delete-business/{id}/delete', [BusinessController::class, 'delete']);
    Route::delete('/business/{id}/delete', [BusinessController::class, 'destroy'])->name('remove-business');

    Route::get('/add-business-photo', [BusinessPhotoController::class, 'create'])->name('add-photo');
    Route::post('/add-business-photo', [BusinessPhotoController::class, 'store']);
    Route::delete('/remove-business-photo/{businessPhoto}/delete', [BusinessPhotoController::class, 'removePhoto'])->name('remove-business-photo');
});

Route::name('admin.')->prefix('admin')->group(function(){
    
    Route::get('/view-make-manager-requests', [MakeManagerRequestController::class, 'showRequests'])->name('view-make-manager-requests');
    Route::put('/make-manager/{user}', [MakeManagerRequestController::class, 'makeManager'])->name('make-manager');
    Route::delete('/decline-manager/{id}', [MakeManagerRequestController::class, 'declineManagerRequest'])->name('decline-manager');

});