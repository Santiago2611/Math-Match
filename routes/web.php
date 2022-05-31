<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        session()->put("userid", Auth::user()->id);
        session()->put("username", Auth::user()->name);
        return view('dashboard');
    })->name('dashboard');
    Route::get('/classes', [ClassroomController::class,'showClass'])->name('class.show');

    Route::controller(GameController::class)->group(function(){
        Route::get('juegos','viewGames')->name('games');
        Route::get('juegos/concentrado','playConcentrado')->name('concentrado');
        Route::get('comenzar/{game}','initializeProgress')->name('initializeProgress');
    });

    Route::get('/search/classes/', [ClassroomController::class,'searchClass'])->name('search.class');
});






