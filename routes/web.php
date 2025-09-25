<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('checkAuth');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// blogs data store
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');


// opening page display

Route::get('/', function () {
    return view('home.home');
})->name('home');


Route::get('/', [BlogController::class, 'index'])->name('home');
