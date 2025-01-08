<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Category
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('add', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Tag
    Route::prefix('tags')->name('tags.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('add', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('{id}', [TagController::class, 'edit'])->name('edit');
        Route::put('{id}', [TagController::class, 'update'])->name('update');
        Route::delete('{id}', [TagController::class, 'destroy'])->name('destroy');
    });

    // User
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('{id}', [UserController::class, 'update'])->name('update');
    });

    // Post
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('add', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('{id}', [PostController::class, 'edit'])->name('edit');
        Route::put('{id}', [PostController::class, 'update'])->name('update');
        // Route::delete('{id}', [PostController::class, 'destroy'])->name('destroy');
    });

    // Comment
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::put('{id}', [CommentController::class, 'update'])->name('update');
        Route::delete('{id}', [CommentController::class, 'destroy'])->name('destroy');
    });
});
