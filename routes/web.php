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
Route::resource('/schoolyear',App\Http\Controllers\SchoolYearController::class);
Route::resource('/semester',App\Http\Controllers\SemesterController::class);
Route::resource('/course',App\Http\Controllers\CourseController::class);



Route::resource('/enroll',App\Http\Controllers\EnrolleeController::class);
Route::resource('/level',App\Http\Controllers\LevelController::class);
Route::resource('/section',App\Http\Controllers\SectionController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/reports/student', [App\Http\Controllers\ReportController::class, 'student'])->name('student');

