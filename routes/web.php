<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;

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

// Users
Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('user.store')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Courses
Route::get('/', [CourseController::class, 'index'])->name('courses.index');
Route::get('/course/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth');
Route::post('/course/create', [CourseController::class, 'store'])->name('courses.store')->middleware('auth');
Route::get('/course/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit')->middleware('can:update-course,course');
Route::put('/course/edit/{course}', [CourseController::class, 'update'])->name('courses.update')->middleware('can:update-course,course');
Route::delete('/course/delete/{course}', [CourseController::class, 'delete'])->name('courses.delete')->middleware('can:update-course,course');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('courses.show');

// Sections
Route::get('/section/create/{course}', [SectionController::class, 'create'])->name('sections.create')->middleware('can:update-course,course');
Route::post('/section/create/{course}', [SectionController::class, 'store'])->name('sections.store')->middleware('can:update-course,course');
Route::get('/section/edit/{section}', [SectionController::class, 'edit'])->name('sections.edit')->middleware('can:update-section,section');
Route::put('/section/edit/{section}', [SectionController::class, 'update'])->name('sections.update')->middleware('can:update-section,section');
Route::delete('/section/delete/{section}', [SectionController::class, 'delete'])->name('sections.delete')->middleware('can:update-section,section');

// Rents
Route::get('/profile', [RentController::class, 'index'])->name('rents.index')->middleware('auth');
Route::post('/rent/{course}', [RentController::class, 'store'])->name('rents.store')->middleware('auth');