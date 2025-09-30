<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\HeaderController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('checkAuth');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// blogs data store
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');



// opening page route
Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');



// header routes

// Route::get('/', [HeaderController::class, 'index']);
Route::post('/admin/header/store', [HeaderController::class, 'store'])->name('header.store');
