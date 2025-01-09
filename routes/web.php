<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Home
Route::get('/', [NewsController::class, 'index'])->name('home');

// Authenticated routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'create'])->name('auth.login.view');
    Route::post('login', [LoginController::class, 'store'])->name('auth.login');
    // Register
    Route::get('register', [RegisterController::class, 'create'])->name('auth.register.view');
    Route::post('register', [RegisterController::class, 'store'])->name('auth.register');
});

// Logout
Route::post('logout', [LogoutController::class, 'destroy'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    // Account
    Route::get('me', [AccountController::class, 'edit'])->name('me');
    Route::put('me', [AccountController::class, 'update'])->name('me.update');

    // Comment
    Route::post('comment', [PostController::class, 'comment'])->name('comment');

});

// Posts
Route::get('/{slugs}', [PostController::class, 'show'])->name('post');
Route::get('/category/{slugs}', [PostController::class, 'postsByCategory'])->name('category');
