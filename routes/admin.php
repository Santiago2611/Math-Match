<?php

use App\Http\Controllers\Admin\ClassroomsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('admin.home');
Route::get('/docentes/create',[TeachersController::class,'createTeacher'])->name('create.teachers');
Route::resource('classrooms', ClassroomsController::class)->names('admin.classrooms');
Route::resource('user', TeacherController::class)->names('admin.teachers');
