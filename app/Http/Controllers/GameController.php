<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function viewGames(){
        $progresses = [
            "concentrado" => 0,
            "otrojuego" => 0
        ];
        $progresses["concentrado"] = DB::table('student_game')->where("id_estudiante", session("userid"))->where("juego", "concentrado")->value("nivel_actual");
        return view("games/games", compact('progresses'));
    }

    public function playConcentrado(){
        return view("play/concentrado");
    }
}
