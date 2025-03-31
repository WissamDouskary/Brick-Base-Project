<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Home');
})->name('Home');

Route::get('/About', function(){
    return view('Pages.About');
})->name('About');

Route::get('/products', function(){
    return view('Pages.Products');
})->name('Products');

Route::get('/Workers', function (){
   return view('Pages.Workers');
})->name('Workers');

Route::get('/Contact', function(){
    return view('Pages.Contact');
})->name('Contact');

Route::get('/Workers/Preview', function(){
    return view('Pages.Worker-preview');
})->name('Preview');

Route::get('/Products/Preview', function(){
    return view('Pages.Product-preview');
})->name('ProductPreview');

Route::get('/SignUp', function(){
    return view('Pages.Auth.Sign-up');
})->name('SignUp');

Route::get('/LogIn', function(){
    return view('Pages.Auth.Log-In');
})->name('LogIn');

Route::get('/CompleteRegistration', function(){
    return view('Pages.Auth.Complete-reg');
})->name('CompleteRegistration');

//auth
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/complete', [UserController::class, 'completeRegistration'])->name('completeRegistration');
Route::post('/Logout', [UserController::class, 'Logout'])->name('logout');
Route::post('/Login', [UserController::class, 'Login'])->name('Login');