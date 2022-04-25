<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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
});
Route::controller(StudentController::class)->group(function(){
    Route::post('register','store')->name('register.store');
});


