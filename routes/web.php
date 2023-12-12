<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreViewController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [StoreViewController::class, 'index']);

Route::get('/checkout/{id}', [CheckoutController::class, 'checkout']);
Route::get('/order/{id}/payment', [CheckoutController::class, 'payment'])->name('order.payment');
Route::post('/checkout/{id}', [CheckoutController::class, 'checkoutPost']);
Route::post('/stripe-checkout', [CheckoutController::class, 'stripePost'])->name('stripe.post');
