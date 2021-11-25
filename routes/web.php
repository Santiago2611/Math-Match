<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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

Route::get('/', HomeController::class)->name('index');
Route::get("/registro", [UsersController::class,'Registro'])->name('registro');
Route::post("/validar",[UsersController::class, 'Datos'])->name('datos');
Route::get("/login", [UsersController::class,'Login'])->name('login');
