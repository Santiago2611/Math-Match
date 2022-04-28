<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',HomeController::class)->name('welcome');

Route::controller(UserController::class)->group(function(){
    Route::get('login','login')->name('login');
    Route::get('register','signup')->name('register');
    Route::get('student','student')->name('student');
    Route::get('register/teacher','signup_teacher')->name('register.teacher');
});
Route::controller(StudentController::class)->group(function(){
    Route::post('register','store')->name('register.store');
    Route::post('login','check')->name('login.check');
});
Route::controller(TeacherController::class)->group(function(){
    Route::post('register/teacher','store')->name('registerTeacher.store');
    Route::post('login/teacher','login')->name('login.checkTeacher');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/students','showStudents')->name('show');
});


