<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Customer\WorkerController;
use App\Http\Controllers\User\QuestionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [ApiUserController::class, 'register'])->name('register');
Route::post('/login', [ApiUserController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:api', 'role.customer'], 'namespace' => 'Customer'], function () {
    Route::get('/workers', [WorkerController::class, 'index'])->name('customer.index');
});
Route::group(['middleware' => ['auth:api', 'role.worker'], 'namespace' => 'Worker'], function () {
    Route::get('/customers', [WorkerController::class, 'index'])->name('worker.index');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
