<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PublicationCommentsController;
use App\Http\Controllers\PublicationController;
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
        Route::get('/clases', 'showClasses')->middleware('can:see.class')->name('class.show');
        Route::get('/clases/buscar', 'searchClass')->middleware('can:see.class')->name('search.class');
        Route::post('/unirse/clases/', 'joinClass')->middleware('can:join.class')->name('join.class');
        Route::post('/unirse/clases/privada', 'sendJoinRequest')->middleware('can:sendJoinRequests')->name('class.joinRequest');
        Route::post('/clases/cancelarPeticion', 'cancelJoinRequest')->middleware('can:cancelJoinRequests')->name('class.cancelJoinRequest');
        Route::delete('/abandonar/clases/', 'leaveClass')->middleware('can:leave.class')->name('leave.class');
        Route::resource('classrooms', ClassroomController::class)->middleware('can:teacher.classroom')->names('teacher.classrooms');
        Route::get('clases/misClases','showStudentClasses')->middleware('can:showStudentClasses')->name('student.seeClasses');
        Route::get('/status/update','updateStatus')->name('update.status');
        Route::get('/docentes/notificaciones','showJoinRequests')->middleware('can:showJoinRequests')->name('teacher.joinRequests');
        Route::post('clases/responderSolicitud','replyJoinRequest')->middleware('can:replyJoinRequests')->name('teacher.replyJoinRequest');
        Route::get('/clases/{id}', 'seeClass')->middleware('can:join.class')->name('see.class');
        Route::delete('classrooms/{id}/expulsar', 'expelStudent')->middleware('can:teacher.classroom')->name('teacher.expelStudent');
    });

    Route::controller(GameController::class)->group(function(){
        Route::get('juegos','viewGames')->name('games');
        Route::get('juegos/concentrado','playConcentrado')->name('concentrado');
        Route::get('comenzar/{game}','initializeProgress')->name('initializeProgress');
        Route::post('guardar/{game}','updateProgress')->name('updateProgress');
    });

    Route::controller(PublicationController::class)->group(function(){
        Route::resource('classrooms/publicate', PublicationController::class)->names('teacher.publications');
        Route::post('/descargar','downloadFile')->name('classroom.downloadFile');
    });

    Route::controller(PublicationCommentsController::class)->group(function(){
        Route::resource('clases/responderPublicacion', PublicationCommentsController::class)->names('class.replyPublication');
    });

});
