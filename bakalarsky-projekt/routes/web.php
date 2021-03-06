<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalPaymentController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/payment_history', function () {
    return view('payment_history');
})->name('payment_history');

Route::middleware(['auth:sanctum', 'verified'])->get('/stripe', function () {
    return view('stripe');
})->name('stripe');
Route::middleware(['auth:sanctum', 'verified'])->get('/pay', function () {
    return view('pay');
})->name('pay');

Route::middleware(['auth:sanctum', 'verified'])->get('/paypal', function () {
    return view('paypal');
})->name('paypal');


Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');



Route::get('/stripe2', function (){
    return view('stripe2',
    ['intent' => auth()->user()->createSetupIntent(),]);
})->middleware(['auth'])->name('stripe2');

Route::post('/stripe2',function (Request $request){
    auth()->user()->newSubscription(
        'default', $request->plan
    )->create($request->paymentMethodId);
})->middleware(['auth'])->name('stripe2');

//clear cache
//Route::get('/clear-cache', function() {
//
//    $configCache = Artisan::call('config:cache');
//    $clearCache = Artisan::call('cache:clear');
//     return ('success');
//});

//Route::get('/paypal', function () {
//    return view('paypal');
//})->name('paypal');
//Route::post('process-transaction', [PayPalPaymentController::class, 'processTransaction'])->name('paypal.payment');
Route::get('create-transaction', [PayPalPaymentController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalPaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalPaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalPaymentController::class, 'cancelTransaction'])->name('cancelTransaction');



