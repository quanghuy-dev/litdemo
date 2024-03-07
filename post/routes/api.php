<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// User Auth
Route::post('auth/login', [App\Http\Controllers\User\AuthController::class, 'login'])->name('login');
Route::post('auth/logout', [App\Http\Controllers\User\AuthController::class, 'logout'])->name('logout');
Route::get('/me', [App\Http\Controllers\User\AuthController::class, 'me'])->name('me');
Route::post('/register', [App\Http\Controllers\User\AuthController::class, 'register'])->name('register');

// User Post 
Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::get('/posts', [App\Http\Controllers\HomeController::class, 'list_post'])->name('post.list');
    Route::get('/posts/{id}', [App\Http\Controllers\HomeController::class, 'detail_post'])->name('post.detail');
});