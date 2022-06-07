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
        $progresses["concentrado"] = DB::table('student_game')->where("id_estudiante", auth()->user()->id)->where("juego", "concentrado")->value("nivel_actual");
        return view("games/games", compact('progresses'));
    }

    public function playConcentrado(){
        $level = DB::table('student_game')->where("id_estudiante", auth()->user()->id)->where("juego", "concentrado")->value("nivel_actual");
        if ($level > 25) {
            return redirect()->route("games");
        } else {
            return view("play/concentrado", compact('level'));
        }
    }

    public function initializeProgress($game){
        $data = [
            "id_estudiante" => auth()->user()->id,
            "juego" => $game,
            "nivel_actual" => 1
        ];
        DB::table("student_game")->insert($data);
        return redirect()->route($game);
    }

    public function updateProgress($game){
        $query = DB::table("student_game")->where('id_estudiante', auth()->user()->id)->where('juego', $game);
        if ($query->value("nivel_actual") <= 25) {
            $query->increment('nivel_actual', 1);
            return redirect()->route($game);
        } else {
            return redirect()->route("games");
        }
    }
}
