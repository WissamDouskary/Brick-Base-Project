<?php

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