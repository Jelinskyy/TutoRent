<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;

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
Route::get('/course/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit')->middleware('can:update-course,course');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('courses.show');

// Users
Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('user.store')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Rents
Route::post('/rent/{course}', [RentController::class, 'store'])->name('rents.store')->middleware('auth');