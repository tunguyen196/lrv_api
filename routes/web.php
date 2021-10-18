<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexControler;
use App\Http\Controllers\User\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::prefix('user')->group(function () {
        Route::get('/auth/facebook', [LoginController::class, 'redirectLogin'])->name('redirect.login');
        Route::get('/auth/facebook/callback', [LoginController::class, 'callbackLogin'])->name('callback.login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexControler::class, 'index'])->name('home');
    Route::get('/home', [IndexControler::class, 'index'])->name('home');
});
