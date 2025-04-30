<?php

use App\Models\Review;
use App\Http\Middleware\checkadmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkUserRole;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserActive;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportsController;

use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CommentsController;
use App\Http\Middleware\RestrictAdminAccess;
use App\Http\Middleware\checkWorkerActivated;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\WorkerProfileController;

//public routes
route::middleware(RestrictAdminAccess::class)->group(function(){

Route::get('/SignUp', function () {
    return view('Pages.Auth.Sign-up');
})->name('SignUp');

Route::get('/Login', function () {
    return view('Pages.Auth.Log-In');
})->name('login');

Route::get('/Inactive', function () {
    return view('Pages.Auth.in-active');
})->name('in-active')->middleware(checkWorkerActivated::class);

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

});

Route::middleware(['auth', CheckUserActive::class, RestrictAdminAccess::class])->group(function () {

    Route::get('/Workers/Preview/{id}', [UserController::class, 'find'])->name('Preview');

    Route::get('/Products/Preview/{id}', [ProductController::class, 'find'])->name('ProductPreview');

    Route::get('/worker/{id}/disabled-dates', [ReservationController::class, 'getWorkerReservedDays']);

    Route::post('/Worker/Reservation', [ReservationController::class, 'create'])->name('reservation.store');

    Route::get('/Client/offers', [ReservationController::class, 'getClientOffers'])->name('client.offers');

    Route::get('/Client/Profile', function () {
        return view('Pages.Profiles.client-profile');
    })->name('client.profile');

    Route::post('/product/buy', [OrderController::class, 'store'])->name('product.buy');

    Route::get('/orders', [OrderController::class, 'getClientOrders'])->name('orders.list');

    Route::delete('/order/cancel/{id}', [OrderController::class, 'cancelOrder'])->name('order.cancel');

    Route::post('/review/create', [ReviewsController::class, 'store'])->name('review.store');
    Route::put('/review/update/{id}', [ReviewsController::class, 'update'])->name('review.update');
    Route::delete('/review/destroy/{id}', [ReviewsController::class, 'destroy'])->name('review.delete');
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

Route::get('/Worker/Profile', [ProductController::class, 'getWorkerProducts'])->name('workerprofile')->middleware('auth', checkUserRole::class);

Route::put('/profile/update', [WorkerProfileController::class, 'update'])->name('worker.profile.edit')->middleware('auth');
Route::put('/Client/Profile/Update', [ClientProfileController::class, 'update'])->name('client.profile.edit')->middleware('auth');

Route::post('/offer/{id}/{status}', [ReservationController::class, 'manageOffers'])->name('offer.manage')->middleware(['auth', CheckUserActive::class]);

Route::post('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/complete', [UserController::class, 'completeRegistration'])->name('completeRegistration');
Route::post('/login', [UserController::class, 'login'])->name('sign_in')->middleware('guest');
Route::post('/Logout', [UserController::class, 'Logout'])->name('logout');

//paypal 
Route::get('/checkout', [PayPalController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/create-order/{id}', [PayPalController::class, 'createOrder'])->name('create.order')->middleware('auth');
Route::post('/capture-order/{orderId}', [PayPalController::class, 'captureOrder'])->name('capture.order')->middleware('auth');
Route::post('/create-multi-order', [PayPalController::class, 'createMultiOrder'])->name('create.multi.order')->middleware('auth');

Route::get('/checkout/success', [PayPalController::class, 'handleSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [PayPalController::class, 'handleCancel'])->name('checkout.cancel');


//dashboard
Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/dashboard/reports', [ReportsController::class, 'index'])->name('dashboard.reports');
    Route::get('/dashboard/people', [PeopleController::class, 'index'])->name('dashboard.people');
    Route::get('/dashboard/activities', [ActivitiesController::class, 'index'])->name('dashboard.activities');
    Route::post('/dashboard/people/{id}/{status}', [PeopleController::class, 'manageStatus'])->name('dashboard.people.status');
    Route::get('/dashboard/comments', [CommentsController::class, 'index'])->name('dashboard.comments');

    //manage products
    Route::post('/dashboard/Product/{id}/{status}', [ActivitiesController::class, 'manageProduct'])->name('dashboard.manageProduct');
    Route::delete('/comment/delete/{id}', [CommentsController::class, 'destroy'])->name('comments.delete');
});
