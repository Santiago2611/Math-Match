<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function viewgames(){
        return view("viewgames");
    }

    public function game($game){
        $progress = DB::table('student_game')->where("id_estudiante", session("userid"))->where("nombre_juego", $game)->value("nivel_actual");
        return view("games/$game", compact('progress'));
    }

    public function playGame($game){
        return view("play/$game");
    }
}
