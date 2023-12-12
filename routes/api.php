<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\InitializerController;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StoreController;
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

Route::get('/', function () {
    return response()->json([
        'Elemental Roleplay Store',
        'Version 1.0.0',
        'Developed by JpDevs'
    ]);
});

Route::get('/store', [StoreController::class, 'index']);

Route::get('/categories', [StoreController::class, 'getAllCategories']);

Route::get('/store/category/{id}', [StoreController::class, 'getProductsByCategory']);

Route::get('/order', [StoreController::class, 'order']);

Route::get('/get-order/{hash}', [StoreController::class, 'getOrders']);

Route::post('/order/{productId}/pre-process', [StoreController::class, 'preprocess'])->name('order.preprocess');

Route::post('/order/persist', [StoreController::class, 'persist']);

Route::post('/stripe/session', [StoreController::class, 'getStripeSession'])->name('stripe.session');

Route::get('/order/process/{playerId}/{productId}', [StoreController::class, 'process'])->name('order.process');

