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
    Route::controller(ClassroomController::class)->group(function(){
        Route::get('/classes', 'showClass')->name('class.show');
        Route::get('/search/classes/', 'searchClass')->name('search.class');
        Route::post('/join/classes/', 'joinClass')->name('join.class');
        Route::get('/create/class','create')->name('create.class');
        Route::post('/create/class','store')->name('create.store');

    });

    Route::controller(GameController::class)->group(function(){
        Route::get('juegos','viewGames')->name('games');
        Route::get('juegos/concentrado','playConcentrado')->name('concentrado');
        Route::get('comenzar/{game}','initializeProgress')->name('initializeProgress');
        Route::post('guardar/{game}','updateProgress')->name('updateProgress');
    });

});






