<?php

use App\Http\Controllers\Admin\ClassroomsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('admin.home');
Route::resource('classrooms', ClassroomsController::class)->names('admin.classrooms');
Route::resource('user', TeacherController::class)->names('admin.teachers');
Route::resource('user', UserController::class)->only('index','update','edit')->names('admin.users');
