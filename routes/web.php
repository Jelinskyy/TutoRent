<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;

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

// Courses
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// Users
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('user.store');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');