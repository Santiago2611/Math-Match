<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('admin.home');
Route::get('/docentes/create',[TeachersController::class,'createTeacher'])->name('create.teachers');
