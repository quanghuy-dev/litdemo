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
Route::post('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/me', [App\Http\Controllers\HomeController::class, 'me'])->name('me');

// User Post 
Route::get('/posts', [App\Http\Controllers\HomeController::class, 'list_post'])->name('post.list');
Route::get('/posts/{id}', [App\Http\Controllers\HomeController::class, 'detail_post'])->name('post.detail');
