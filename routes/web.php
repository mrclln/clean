<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth','role:']], function () {



});
Route::group(['middleware' => ['auth','role:Super Admin|Registrar|Admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::group(['middleware' => ['auth','role:Super Admin|Admin']], function () {
    Route::resource('/user',App\Http\Controllers\UserController::class);
    Route::resource('/role',App\Http\Controllers\RoleController::class);
});
Route::group(['middleware' => ['auth','role:Super Admin']], function () {
    Route::resource('/schoolyear',App\Http\Controllers\SchoolYearController::class);
    Route::resource('/semester',App\Http\Controllers\SemesterController::class);
    Route::resource('/course',App\Http\Controllers\CourseController::class);
    Route::resource('/enroll',App\Http\Controllers\EnrolleeController::class);
    Route::resource('/level',App\Http\Controllers\LevelController::class);
    Route::resource('/section',App\Http\Controllers\SectionController::class);
    Route::get('/reports/student', [App\Http\Controllers\ReportController::class, 'student'])->name('student');
});
Route::group(['middleware' => ['auth','role:Super Admin']], function () {
    Route::resource('/schoolyear',App\Http\Controllers\SchoolYearController::class);
    Route::resource('/semester',App\Http\Controllers\SemesterController::class);
    Route::resource('/course',App\Http\Controllers\CourseController::class);
    Route::resource('/enroll',App\Http\Controllers\EnrolleeController::class);
    Route::resource('/level',App\Http\Controllers\LevelController::class);
    Route::resource('/section',App\Http\Controllers\SectionController::class);
    Route::get('/reports/student', [App\Http\Controllers\ReportController::class, 'student'])->name('student');
});











