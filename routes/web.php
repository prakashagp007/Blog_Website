<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SocialLinkController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->middleware('checkAuth');

Route::get('/dashboard', [BlogController::class, 'table'])
    ->name('dashboard')
    ->middleware('checkAuth');

    // dashboard table crud
    Route::get('/db/view/{id}', [BlogController::class, 'view'])->name('blogs.view');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

    Route::put('/blogs/{id}/update', [BlogController::class, 'update'])->name('blogs.update');

    Route::delete('/blogs/{id}/destroy', [BlogController::class, 'destroy'])->name('blogs.delete');

    // header table crud

    Route::get('/header/{id}/view',[BlogController::class, 'headerview'])->name('header.view');

    Route::get('/header/{id}/edit', [BlogController::class, 'headeredit'])->name('header.edit');
     Route::put('/header/{id}/update', [BlogController::class, 'headerupdate'])->name('header.update');
    Route::delete('/header/{id}/destroy', [BlogController::class, 'headerdestroy'])->name('header.delete');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// blogs data store
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');



// opening page route
Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');



// header routes

// Route::get('/', [HeaderController::class, 'index']);
Route::post('/admin/header/store', [HeaderController::class, 'store'])->name('header.store');

// social media store
Route::post('/admin/socialmedia/store', [SocialLinkController::class, 'store'])->name('sociallinks.store');

// Route::get('/dashboard/table', [BlogController::class, 'table'])->name('blog.table');
