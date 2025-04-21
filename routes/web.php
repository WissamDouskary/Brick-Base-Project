<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkUserRole;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserActive;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\checkWorkerActivated;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkerProfileController;

use App\Http\Controllers\PayPalController;

Route::get('/SignUp', function () {
    return view('Pages.Auth.Sign-up');
})->name('SignUp');

Route::get('/Login', function () {
    return view('Pages.Auth.Log-In');
})->name('login');

Route::get('/Inactive', function () {
    return view('Pages.Auth.in-active');
})->name('in-active')->middleware(checkWorkerActivated::class);

Route::middleware(['auth', CheckUserActive::class])->group(function () {
    Route::get('/Workers', [UserController::class, 'getWorkers'])->name('Workers');

    Route::get('/', function () {
        return view('Pages.Home');
    })->name('Home');

    Route::get('/About', function () {
        return view('Pages.About');
    })->name('About');

    Route::get('/products', [ProductController::class, 'getall'])->name('Products');

    Route::get('/Contact', function () {
        return view('Pages.Contact');
    })->name('Contact');

    Route::get('/Workers/Preview/{id}', [UserController::class, 'find'])->name('Preview');

    Route::get('/Products/Preview/{id}', [ProductController::class, 'find'])->name('ProductPreview');

    Route::post('/Worker/Reservation', [ReservationController::class, 'create'])->name('reservation.store');

    Route::get('/Client/offers', [ReservationController::class, 'getClientOffers'])->name('client.offers');

    Route::get('/Client/Profile', function () {
        return view('Pages.Profiles.client-profile');
    })->name('client.profile');

    Route::post('/product/buy', [OrderController::class, 'store'])->name('product.buy');

    Route::get('/orders', [OrderController::class, 'getClientOrders'])->name('orders.list');
});

Route::middleware(['auth', checkUserRole::class, CheckUserActive::class])->group(function () {
    Route::get('/Product/List', [ProductController::class, 'index'])->name('product_list');
    Route::post('/Product/create', [ProductController::class, 'store'])->name('product.create');
    Route::put('/Product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/Product/destory/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/offers', [ReservationController::class, 'getWorkerOffers'])->name('offers');
});

Route::get('/CompleteRegistration', function () {
    return view('Pages.Auth.Complete-reg');
})->name('CompleteRegistration')->middleware('auth');

Route::get('/Worker/Profile', [ProductController::class, 'getWorkerProducts'])->name('workerprofile');

Route::put('/profile/update', [WorkerProfileController::class, 'update'])->name('worker.profile.edit')->middleware('auth');
Route::put('/Client/Profile/Update', [ClientProfileController::class, 'update'])->name('client.profile.edit')->middleware('auth');

Route::post('/offer/{id}/{status}', [ReservationController::class, 'manageOffers'])->name('offer.manage')->middleware(['auth', CheckUserActive::class]);

Route::post('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/complete', [UserController::class, 'completeRegistration'])->name('completeRegistration');
Route::post('/login', [UserController::class, 'login'])->name('sign_in')->middleware('guest');
Route::post('/Logout', [UserController::class, 'Logout'])->name('logout');

//paypal 
Route::get('/checkout', [PayPalController::class, 'checkout'])->name('checkout');
Route::post('/create-order/{id}', [PayPalController::class, 'createOrder'])->name('create.order');
Route::post('/capture-order/{orderId}', [PayPalController::class, 'captureOrder'])->name('capture.order');
Route::post('/create-multi-order', [PayPalController::class, 'createMultiOrder'])->name('create.multi.order');

Route::get('/checkout/success', [PayPalController::class, 'handleSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [PayPalController::class, 'handleCancel'])->name('checkout.cancel');
