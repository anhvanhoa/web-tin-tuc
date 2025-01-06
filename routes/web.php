<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

// // LoginLogin
// Route::group([], function () {
//     Route::post('login', LoginController::class . '@login')->name('create');
// });

// Register
// Route::group([], function () {
//     Route::post('register', [RegisterController::class, 'store'])->name('auth.register');
// });
