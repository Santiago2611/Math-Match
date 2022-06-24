<?php

use App\Http\Controllers\Admin\ClassroomsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('classrooms', ClassroomsController::class)->except('store','create')->names('admin.classrooms');
Route::resource('user', UserController::class)->only('index','update','edit','store','create')->names('admin.users');
