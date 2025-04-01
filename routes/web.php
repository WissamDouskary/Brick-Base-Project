<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkUserRole;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserActive;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WorkerProfileController;

Route::get('/SignUp', function () {
    return view('Pages.Auth.Sign-up');
})->name('SignUp');

Route::get('/Login', function () {
    return view('Pages.Auth.Log-In');
})->name('login');

Route::get('/Inactive', function () {
    return view('Pages.Auth.in-active');
})->name('in-active');

Route::middleware(['auth', CheckUserActive::class])->group(function(){
    Route::get('/Workers', [UserController::class, 'getWorkers'])->name('Workers');

    Route::get('/', function () {
        return view('Pages.Home');
    })->name('Home');
    
    Route::get('/About', function () {
        return view('Pages.About');
    })->name('About');
    
    Route::get('/products', function () {
        return view('Pages.Products');
    })->name('Products');
    
    Route::get('/Contact', function () {
        return view('Pages.Contact');
    })->name('Contact');

    Route::get('/Workers/Preview/{id}', [UserController::class, 'find'])->name('Preview');

    Route::get('/Products/Preview', function () {
        return view('Pages.Product-preview');
    })->name('ProductPreview');
});

Route::middleware(['auth', checkUserRole::class, CheckUserActive::class])->group(function(){
    Route::get('/Product/List', [ProductController::class, 'index'])->name('product_list');
});

Route::get('/CompleteRegistration', function () {
    return view('Pages.Auth.Complete-reg');
})->name('CompleteRegistration')->middleware('auth');

Route::get('/Worker/Profile', function(){
    return view('Pages.Profiles.worker-profile');
})->name('workerprofile');

Route::put('/profile/update', [WorkerProfileController::class, 'update'])->name('worker.profile.edit')->middleware('auth');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/complete', [UserController::class, 'completeRegistration'])->name('completeRegistration');
Route::post('/login', [UserController::class, 'login'])->name('sign_in');
Route::post('/Logout', [UserController::class, 'Logout'])->name('logout');
