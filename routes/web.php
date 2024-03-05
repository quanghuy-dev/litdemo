<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'home'])->name('home');

// Home Page
Route::get('/home', [PostController::class, 'home'])->name('home');

// Auth
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name("register");
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name("login");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
