<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

    Route::get('/register', function () {
    return view('auth.register');});
    Route::get('/login', function () {
    return view('auth.login');});
    Route::post('/register', [UserController::class, 'storeUser']);
    Route::post('/login', [UserController::class, 'loginUser']);
    Route::middleware('auth')->group(function(){
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/mypage', [ItemController::class, 'profile']);
        Route::get('/initial/mypage/profile', [ItemController::class, 'initialEditProfile']);
        Route::get('/mypage/profile', [ItemController::class, 'editProfile']);
        Route::post('/initial/mypage/profile', [ItemController::class, 'storeProfile']);
        Route::put('/mypage/profile', [ItemController::class, 'updateProfile']);
        Route::get('/sell', [ItemController::class, 'showExhibit']);
        Route::post('/sell', [ItemController::class, 'exhibit']);
        Route::get('/product/{productId}', [ItemController::class, 'detail']);
        Route::post('/comment/{productId}', [ItemController::class, 'postComment']);
        Route::get('/purchase/{productId}', [ItemController::class, 'showPurchase']);
        Route::post('/purchase/{productId}', [ItemController::class, 'purchase'])->name('purchase');
        Route::get('/address/edit',
        [ItemController::class, 'editAddress']);
        Route::post('/address', [ItemController::class, 'updateAddress']);
        Route::post('/logout', [UserController::class, 'logout']);
    });
