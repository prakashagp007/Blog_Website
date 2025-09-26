<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;



// (you probably already have edit/update routes)
// Route::get('/image/{id}/edit', [ImageController::class, 'edit'])->name('image.edit');
// Route::post('/image/{id}/update', [ImageController::class, 'update'])->name('image.update');

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




// Route::get('/', [BlogController::class, 'index'])->name('home');

// opening page route 
Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');



