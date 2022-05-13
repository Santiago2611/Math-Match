<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{

    public function viewgames(){
        return view("viewgames");
    }

    public function concentrado(){
        return view("games.concentrado_start");
    }

    public function playConcentrado(){
        return view("play.concentrado_game");
    }
}
